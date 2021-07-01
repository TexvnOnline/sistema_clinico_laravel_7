<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'amount',
        'status',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function appointment(){
        return $this->hasOne('App\Appointment');
    }
    public function metas(){
        return $this->hasMany('App\InvoiceMeta');
    }
    // registrar factura
    public function store($request, $amount){
        $user = User::findOrFail(decrypt($request->user_id));
        return self::create([
            'amount' => $amount,
            'status' => 'pending',
            'user_id' => $user->id
        ]);
    }
    // recuperar informacion
    public function meta($key, $default = null){
        $value = $this->metas->where('key', $key)->first();
        $value = (is_null($value)) ? $default : $value->value;
        return $value;
    }
    public function concept(){
        return $this->meta('concept', 'Sin especificar');
    }
    public function doctor($default = 'Sin especificar'){
        $user_id = $this->meta('doctor', $default);
        $user = User::findOrFail($user_id);
        return $user;
    }
    public function status(){
        switch ($this->status) {
            case 'pending':
                return 'Pendiente';
            break;
            case 'approved':
                return 'Pagado';
            break;
            case 'rejected':
                return 'Rechazado';
            break;
            case 'cancelled':
                return 'Cancelado';
            break;
            case 'refunded':
                return 'Reembolsado';
            break;
            default:
                # code...
            break;  
        }
    }
}
