<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'observations',
        'diagnostic',
        'doctor_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function recipe_details()
    {
        return $this->hasMany(RecipeDetail::class);
    }
    // Función de almacenamiento 
    public function store($request, $user){
        $recipe = self::create([
            'observations' => $request->observations,
            'diagnostic' => $request->diagnostic,
            'doctor_id' => auth()->user()->id,
            'user_id' => $user->id,
        ]);
        foreach ($request->medicinef as $key => $med) {
            $results[] = array("medicine"=>$request->medicinef[$key], "instruction"=>$request->instructionf[$key]);
        }
        $recipe->recipe_details()->createMany($results);
    }
    // actualizar
    public function my_update($user, $request, $recipe){
        
        $recipe->update([
            'observations' => $request->observations,
            'diagnostic' => $request->diagnostic,
        ]);
        foreach ($recipe->recipe_details as $key => $detail) {
            $results[] = array("medicine"=>$request->medicinef[$key], "instruction"=>$request->instructionf[$key]);
            $detail->update($results[$key]);
        }
    }
    public function doctor($recipe){
        $doctor = User::findOrFail($recipe->doctor_id);
        return $doctor;
    }
}
