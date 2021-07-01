<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisableDate extends Model
{
    protected $fillable = [
        'key',
        'value',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function process_disabled_dates($dates)
    {
        $dates = explode(',', $dates);
        $str_dates = '';
        foreach ($dates as $key => $date) {
            $date = trim($date);
            $date_elements = explode('/', $date);
            $year = $date_elements[0];
            $month = $date_elements[1];
            $day = $date_elements[2];
            $new_date = $year . ',' . ($month - 1) . ',' . $day;
            $str_dates .= $new_date . '-';
        }
        $str_dates = substr($str_dates, 0, -1);
        return $str_dates;
    }
}
