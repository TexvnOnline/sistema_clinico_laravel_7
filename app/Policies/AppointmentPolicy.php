<?php

namespace App\Policies;

use App\Appointment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
        //
    }
    public function view(User $user, Appointment $appointment)
    {
        //
    }
    public function create(User $user)
    {
        //
    }
    public function update(User $user, Appointment $appointment)
    {
        //
    }
    public function delete(User $user, Appointment $appointment)
    {
        //
    }
    public function restore(User $user, Appointment $appointment)
    {
        //
    }
    public function forceDelete(User $user, Appointment $appointment)
    {
        //
    }
    public function edit_back_appointment(User $user, Appointment $appointment){
        if ($user->hasRole('Doctor')) {
            return $user->id == $appointment->doctor()->id;
        }else{
            return true;
        }
    }
}
