<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Requests\Specialty\StoreRequest;
use App\Http\Requests\Specialty\UpdateRequest;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:specialties.index',
            'permission:specialties.store',
            'permission:specialties.create',
            'permission:specialties.update',
            'permission:specialties.destroy',
            'permission:specialties.show',
            'permission:specialties.edit'
            ]);
    }
    public function index()
    {
        $specialties = Specialty::all();
        return view('admin.specialties.index', compact('specialties'));
    }
    public function create()
    {
        return view('admin.specialties.create');
    }
    public function store(StoreRequest $request)
    {
        Specialty::create($request->all());
        return redirect()->route('specialties.index')->with('flash', 'registrado');
    }
    public function show(Specialty $specialty)
    {
        $users = $specialty->users;
        return view('admin.specialties.show', compact('specialty', 'users'));
    }
    public function edit(Specialty $specialty)
    {
        return view('admin.specialties.edit', compact('specialty'));
    }
    public function update(UpdateRequest $request, Specialty $specialty)
    {
        $specialty->update($request->all());
        return redirect()->route('specialties.index')->with('flash', 'actualizado'); 
    }
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return back()->with('flash', 'eliminado');
    }
}
