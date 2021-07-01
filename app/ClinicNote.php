<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicNote extends Model
{
    protected $fillable = [
        'date',
        'description',
        'privacy',
        'user_id',
        'created_by',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
