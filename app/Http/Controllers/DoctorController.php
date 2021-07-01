<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;
use App\User;
use App\Appointment;
class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:doctor.appointments',
            'permission:doctor.assign_specialty',
            'permission:doctor.update_specialty'
            ]);
    }
    public function assign_specialty(User $user){
        $specialties = Specialty::all();
        return view('admin.doctor.assign_specialty', compact('user', 'specialties'));
    }
    public function update_specialty(User $user, Request $request){
        $user->specialties()->sync($request->get('specialties'));
        return back()->with('flash', 'actualizado');
    }
    public function doctor_appointments(User $user){

        $this->authorize('view_appointments_calendar', $user);

        $appointments_collection = Appointment::where('doctor_id',$user->id)->get();
        $appointments = [];
        foreach ($appointments_collection as $key => $appointment) {
            $appointments[] = [
                'title' => $appointment->user->name.' Cita con '.$appointment->doctor()->name,
                'start' => $appointment->date->format('Y-m-d\TH:i:s'),
                'url' => route('back.patient.appointment.edit', [$appointment->user, $appointment]),
            ];
        }
        return view('admin.appointments.index', [
            'appointments' => json_encode($appointments)
        ]);
    }
}
