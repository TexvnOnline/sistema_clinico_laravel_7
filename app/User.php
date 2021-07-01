<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Specialty;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
// class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function specialties(){
        return $this->belongsToMany('App\Specialty')->withTimestamps();
    }
    public function invoices(){
        return $this->hasMany('App\Invoice');
    }
    public function appointments(){
        return $this->hasMany('App\Appointment');
    }
    public function clinic_datas()
    {
        return $this->hasMany('App\ClinicData');
    }
    public function clinic_notes(){
        return $this->hasMany('App\ClinicNote');
    }
    public function age(){
        if(!is_null($this->profile->birthdate)){
            $age = $this->profile->birthdate->age;
            $years = ($age == 1) ? 'año' : 'años' ;
            $msj = $age.' '.$years;
        }else{
            $msj = 'Indefinido';
        }
       
        return $msj;
    }
    // recuperar usuarios dependiendo del rol del usuario logeado
    public function visible_users(){
        if($this->hasRole('Admin')) {
            $users = self::all();
        } else if($this->hasRole('Secretary')){
            $users = User::role(['Patient', 'Doctor'])->get();
            // $users = User::role('Doctor', 'Patient')->get();
        }else if($this->hasRole('Doctor')){
            $users = User::role('Patient')->get();
        }
        return $users;
    }
    //
    public function visible_roles(){
        if($this->hasRole('Admin')){
            $roles = Role::all();
        }
        if($this->hasRole('Secretary') || $this->hasRole('Doctor')){
            $roles = Role::where('name', 'Patient')->get();
        }
        return $roles;
    }
    // registrar usuarios
    public function store($request){
        $user = self::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->profile()->create([
            'birthdate'=> Carbon::now()
        ]);
        $profile = $user->profile;
        $profile->image()->create([
                'url' => '/image/avatar.png',
        ]);
        $user->assignRole($request->role);
    }
    // actualizar perfil de los usuarios
    public function update_profile($user, $request){
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            $urlimages ='/image/'.$image_name;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        $profile =  $user->profile;
        $profile->update([
            'birthdate' => $request->birthdate,
            'surnames' => $request->surnames,
        ]);
        if($request->hasFile('avatar')){
            $profile->image()->update([
                'url' => $urlimages,
            ]);
        }
    }
    // relaciones para deshabilitar los horarios para el doctor
    public function doctor_schedules(){
        return $this->hasMany('App\DoctorSchedule');
    }

    public function disable_dates(){
        return $this->hasMany('App\DisableDate');
    }

    public function disable_times(){
        return $this->hasOne('App\DisableTime');
        // return $this->hasMany('App\DisableTime');
    }

    public function has_speciality($id){
        foreach ($this->specialties as $specialty) {
            if ($specialty->id == $id){
                return true;
            }
        }
        return false;
    }
   public function list_specialities(){
        $specialties = $this->specialties->pluck('name')->toArray();
        $string = implode(', ', $specialties);
        return $string;
    }
    // metodos para recuperar informacion de clinic data
    /**
        *El método recibe tres parametros, solo el primero es obligatorio
        *En primer lugar verifica si el arreglo es nulo, en caso de ser así, el mismo método llama a clinic_data_array() para generar un nuevo arreglo.
        *Después se verifica que la clave ($key) exista dentro del arreglo.
        *En caso de existir retorna el valor del arreglo, en caso contrario retorna el valor del parámetro $default
    */
    public function clinic_data_array()
    {
        $datas = $this->clinic_datas->pluck('value','key')->toArray();
        return $datas;
    }
    public function clinic_data($key, $array = null, $default = null)
    {   
        $array = (!is_null($array)) ? $array : $this->clinic_data_array();
        if(array_key_exists($key, $array)){
            $value = $array[$key];
        }else{
            $value = $default;
        } 
        return $value;
    }
    // Este modelo solo va a retornar el registro de las fechas deshabilitadas con el valor de key de manual.
    public function manual_disabled_dates(){
        $disable_date = $this->disable_dates()->where('key', 'manual')->first();
        if(!is_null($disable_date)){
            return $disable_date->value;
        }else{
            return null;
        }   
    }
    public function days_off(){
        $days_off = $this->disable_dates()->where('key', 'days_off')->first();
        if(!is_null($days_off)){
            return $days_off->value;
        }else{
            return null;
        } 
    }
    public function hours(){
        $hours = $this->disable_times()->where('key', 'hours')->first();
        if(!is_null($hours)){
            return $hours->value;
        }else{
            return null;
        } 
    }
    public function doctor_appointments(){
        return $this->hasMany('App\Appointment', 'doctor_id');
    }

    // relacion de recetas medicas 
    public function doctor_recipes(){
        return $this->hasMany('App\Recipe', 'doctor_id');
    }
    public function recipes(){
        return $this->hasMany('App\Recipe');
    }
    // ibtener las recetas de los pacientes
    public function my_recipes($user){
        if($user->hasRole('Patient')) {
            $recipes = Recipe::where('user_id', $user->id)->get();
        }
        return $recipes;
    }
}
