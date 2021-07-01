<?php

namespace App\Http\Controllers;

use App\ClinicData;
use App\User;
use Illuminate\Http\Request;

class ClinicDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:clinical.data.index',
            'permission:clinical.data.store',
            'permission:clinical.data.create'
            ]);
    }
    public function index(User $user)
    {
        $datas = $user->clinic_data_array();
        $clinic_notes = $user->clinic_notes->sortByDesc('created_at');
        return view('admin.clinicdata.index', compact('user', 'datas', 'clinic_notes'));
    }
    public function create(User $user)
    {
        $datas = $user->clinic_data_array();
        return view('admin.clinicdata.create', compact('user', 'datas'));
    }
    public function store(Request $request, User $user, ClinicData $clinicData)
    {
        $clinicData->store($request, $user);
        return redirect()->route('clinical.data.index', $user)->with('flash', 'registrado_actualizado');
    }
    public function show(ClinicData $clinicData)
    {
        //
    }
    public function edit(ClinicData $clinicData)
    {
        //
    }
    public function update(Request $request, ClinicData $clinicData)
    {
        //
    }
    public function destroy(ClinicData $clinicData)
    {
        //
    }
}
