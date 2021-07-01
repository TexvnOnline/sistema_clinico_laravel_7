<?php

namespace App\Policies;

use App\Appointment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
        //
    }
    public function view(User $user, User $model)
    {
        //
    }
    public function create(User $user)
    {
        //
    }
    public function update(User $user, User $model)
    {
        if ($user->id == $model->id) {
            return true;
        }
        return false;
    }
    public function delete(User $user, User $model)
    {
        //
    }
    public function restore(User $user, User $model)
    {
        //
    }
    public function forceDelete(User $user, User $model)
    {
        //
    }
    public function update_password(User $user, User $model){
        return $user->id == $model->id;;
    }
    public function view_appointments_calendar(User $user, User $model){
        if($user->hasRole('Doctor')){
            return $user->id == $model->id;
        }else{
            return true;
        }
    }
}
