<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function user_specialty(Request $request){
        if($request->ajax()){
            $specialty = Specialty::findOrFail($request->specialty);
            $users = $specialty->users;
            return response()->json($users);
        }
    }
    public function disable_dates(Request $request){
        if($request->ajax()){
            $user = \App\User::findOrFail($request->doctor);
            return response()->json([
                'disable_dates' => $user->manual_disabled_dates(),
                'days_off' => $user->days_off(),
            ]);
        }
    }
    public function disable_times(Request $request){
        if($request->ajax()){
            $user = \App\User::findOrFail($request->doctor);
            $date = Carbon::parse($request->date);
            $day = $date->dayOfWeek + 1;
            $hours = json_decode($user->hours(), true);
            $date = $date;
            $appointments = $user->doctor_appointments()
                                ->whereDate('date', $date)
                                ->get()
                                ->pluck('date')
                                ->toJson();

            return response()->json([
                'hours' => $hours,
                'day' => $day,
                'date' => $date,
                'appointments' => $appointments
            ]);
        }
    }
}
