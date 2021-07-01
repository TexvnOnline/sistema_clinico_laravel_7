<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceMeta extends Model
{
    protected $fillable = [
        'key',
        'value',
        'invoice_id',
    ];
    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }
}
