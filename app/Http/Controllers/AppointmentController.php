<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Appointment $appointment)
    {
        //
    }
    public function edit(Appointment $appointment)
    {
        //
    }
    public function update(Request $request, Appointment $appointment)
    {
        //
    }
    public function destroy(Appointment $appointment)
    {
        //
    }
}
