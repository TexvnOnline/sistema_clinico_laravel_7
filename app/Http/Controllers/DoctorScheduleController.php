<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use Illuminate\Http\Request;
use App\User;
class DoctorScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:doctor.schedule.assign',
            'permission:doctor.schedule.assignment'
            ]);
    }
    public function assign(User $user){
        $days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        // $times = json_decode($user->hours(), true);
        // $times = $user->disable_times->value;
        // $disable_dates = $user->manual_disabled_dates();
        // $days_off = $user->days_off();
        return view('admin.doctor.schedule', compact('user', 'days'));
    }
    public function assignment(Request $request, User $user, DoctorSchedule $doctorSchedule){
        $msj = [];
        $msj[0] = $doctorSchedule->disable_dates($request, $user);
        $msj[1] = $doctorSchedule->disable_work_days($request, $user);
        $msj[2] = $doctorSchedule->disable_hours($request, $user);
        return redirect()->route('doctor.schedule.assign', $user)->with('flash', 'actualizado');
    }
}
