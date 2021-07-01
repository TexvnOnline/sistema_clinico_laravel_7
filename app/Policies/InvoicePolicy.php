<?php

namespace App\Policies;

use App\Appointment;
use App\User;
use App\Invoice;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class InvoicePolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
        //
    }
    public function view(User $user, Invoice $invoice)
    {
        //
    }
    public function create(User $user)
    {
        //
    }
    public function update(User $user, Invoice $invoice)
    {
        //
    }
    public function delete(User $user, Invoice $invoice)
    {
        //
    }
    public function restore(User $user, Invoice $invoice)
    {
        //
    }
    public function forceDelete(User $user, Invoice $invoice)
    {
        //
    }
    public function edit_back_invoice(User $user, Invoice $invoice){
        if (Auth::user()->hasRole('Doctor')) {
            if ($invoice->meta('doctor') == $user->id) {
                return true;
            }
            return false;
        }else{
            return true;
        }
    }
}
