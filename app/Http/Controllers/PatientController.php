<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Invoice;
use App\InvoiceMeta;
use App\Recipe;
use App\Specialty;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:patient.index',
            'permission:patient.appointment',
            'permission:patient.appointments',
            'permission:patient.prescriptions',
            'permission:patient.invoice',
            'permission:patient.edit_profile',
            'permission:patient.update_profile',
            'permission:patient.edit_password',
            'permission:patient.update_password',
            'permission:store.appointment'
            ]);
    }
    public function index(){
        $user = auth()->user();
        return view('patient.index', compact('user'));
    }
    public function appointment(){
        $user = auth()->user();
        $specialties = Specialty::all();
        return view('patient.appointment', compact('user', 'specialties'));  
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
        return redirect()->route('patient.appointments')->with('flash', 'agendado');
    }
    public function appointments(){
        $user = auth()->user();
        $appointments = auth()->user()->appointments->sortBy('date');
        return view('patient.appointments', compact('user','appointments'));
    }
    public function prescriptions(){
        $user = auth()->user();
        $recipes = auth()->user()->my_recipes(auth()->user());
        return view('patient.prescriptions', compact('user', 'recipes'));
    }
    public function prescription_details(Recipe $recipe){
        $user = auth()->user();
        $details = $recipe->recipe_details;
        return view('patient.prescription_details', compact('user', 'recipe', 'details'));
    }
    public function invoice(){
        $user = auth()->user();
        $invoices = auth()->user()->invoices;
        return view('patient.invoice', compact('user', 'invoices'));  
    }
    public function edit_profile(){
        $user = auth()->user();
        return view('patient.edit_profile', compact('user'));    
    }
    public function update_profile(User $user, UpdateRequest $request){
        $user->update_profile($user, $request);
        return back()->with('flash', 'actualizado');
    }
    public function edit_password(){
        $user = auth()->user();
        $this->authorize('update_password', auth()->user());
        return view('patient.edit_password', compact('user')); 
    }
    public function update_password(UpdatePasswordRequest $request, User $user){
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('flash', 'contrasenia');
    }
}
