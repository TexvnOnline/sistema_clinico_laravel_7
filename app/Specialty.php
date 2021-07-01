<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'name',
    ];
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
