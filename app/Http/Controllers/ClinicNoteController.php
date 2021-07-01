<?php

namespace App\Http\Controllers;

use App\ClinicNote;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ClinicNote\StoreRequest;
use Carbon\Carbon;
use App\Http\Requests\ClinicNote\UpdateRequest;

class ClinicNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:clinic.note.store',
            'permission:clinic.note.update',
            'permission:clinic.note.destroy',
            'permission:clinic.note.edit'
            ]);
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(StoreRequest $request, User $user)
    {
        ClinicNote::create([
            'date' => Carbon::now(),
            'description' => $request->description,
            'privacy' => $request->privacy,
            'user_id' => $user->id,
            'created_by' => $request->user()->id
        ]);
        return redirect()->route('clinical.data.index', $user)->with('flash', 'nota_registrada');
    }
    public function update(UpdateRequest $request,User $user, ClinicNote $clinicNote)
    {
        $clinicNote->update([
            'description' => $request->description,
		    'privacy' => $request->privacy,
        ]);
        return redirect()->route('clinical.data.index', $user)->with('flash', 'nota_actualizada');
    }
    public function destroy(ClinicNote $clinicNote)
    {
        //
    }
}
