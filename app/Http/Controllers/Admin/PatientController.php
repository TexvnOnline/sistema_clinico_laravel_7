<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Specialty;
use App\Invoice;
use App\InvoiceMeta;
use App\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:all.appointments',
            'permission:back.patient.appointments',
            'permission:back.patient.appointment.edit',
            'permission:back.patient.appointment.update',
            'permission:back.patient.appointment',
            'permission:back.patient.invoice',
            'permission:back.patient.edit.invoice',
            'permission:back.patient.update.invoice',
            'permission:back.patient.store_appointment',
            ]);
    }
    public function index(){
        
        $appointments_collection = Appointment::all();
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
    public function appointment(User $user){
        $specialties = Specialty::all();
        return view('admin.patient.appointment', compact('user', 'specialties'));
    }
    public function appointments(User $user){
        if (auth()->user()->hasRole('Doctor')) {
            $appointments = $user->appointments->where('doctor_id', auth()->user()->id)->sortBy('date');
        } else {
            $appointments = $user->appointments->sortBy('date');
        }
        return view('admin.patient.appointments', compact('user', 'appointments'));
    }
    public function edit_appointment(User $user, Appointment $appointment){

        $this->authorize('edit_back_appointment', $appointment); 

        $specialties = Specialty::all();
        return view('admin.patient.edit_appointment', compact('appointment', 'user', 'specialties'));
    }
    public function update_appointment(User $user, Appointment $appointment, Request $request){

        $this->authorize('edit_back_appointment', $appointment); 

        $date = Carbon::createFromFormat('Y-m-d H:i', $request->date_submit . '' .$request->time_submit);

        $invoice_status = ($request->status == 'done') ? 'approved' : $request->status ;

        $appointment->update([
            'date' => $date->toDateTimeString(),
            'status' => $request->status
        ]);
        $appointment->invoice->update([
            'status' => $invoice_status
        ]);
        return redirect()->route('back.patient.appointments', $user)->with('flash', 'actualizado');
    }
    public function invoice(User $user){
        if (auth()->user()->hasRole('Doctor')) {
            $invoices = [];
            $user_invoices = $user->invoices;
            foreach ($user_invoices as $key => $invoice) {
                if ($invoice->meta('doctor') == auth()->user()->id) {
                    $invoices[] = $invoice;
                }
            }
            $invoices = collect($invoices);
        } else {
            $invoices = $user->invoices;
        }
        return view('admin.patient.invoice', compact('user', 'invoices'));
    }
    public function edit_invoice(User $user, Invoice $invoice){
        $this->authorize('edit_back_invoice', $invoice); 
        return view('admin.patient.edit_invoice', compact('user', 'invoice'));
    }
    public function update_invoice(User $user, Invoice $invoice, Request $request){
        $this->authorize('edit_back_invoice', $invoice);
        $invoice->update([
            'amount' => $request->amount,
            'status' => $request->status
        ]);
        return redirect()->route('back.patient.invoice', $user)->with('flash', 'actualizado');
    }
    public function store_appointment(Request $request){

        $user = User::findOrFail(decrypt($request->user_id));

        $invoice = Invoice::create([
            'amount' => 500,
            'status' => 'pending',
            'user_id' => $user->id,
        ]);
        $date = Carbon::createFromFormat('Y-m-d H:i', $request->date_submit . '' .$request->time_submit);
        InvoiceMeta::create([
            'key' => 'doctor', 
            'value' => $request->doctor, 
            'invoice_id' => $invoice->id
        ]);
        InvoiceMeta::create([
            'key' => 'concept', 
            'value' => 'Cita médica', 
            'invoice_id' => $invoice->id
        ]); 
        $appointment = Appointment::create([
            'date' => $date->toDateTimeString(),
            'doctor_id' => $request->doctor,
            'status'=> 'pending',
            'user_id'=> $invoice->user->id,
            'invoice_id' => $invoice->id
        ]);
        return redirect()->route('back.patient.appointments', $user)->with('flash', 'agendado');
    }
}
