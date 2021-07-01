<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'birthdate', 'surnames',
    ];
    protected $dates = [
        'birthdate',
    ];
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
