<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\StoreRequest;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\Profile\UpdateRequest as UpdateProfileRequest;

use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:user.edit_profile',
            'permission:user.update_profile',
            'permission:users.store',
            'permission:users.index',
            'permission:users.create',
            'permission:users.destroy',
            'permission:users.update',
            'permission:users.show',
            'permission:change_password',
            'permission:users.edit'
            ]);
    }
    public function index()
    {
        $users = auth()->user()->visible_users();
        // $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = auth()->user()->visible_roles();
        // $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function store(StoreRequest $request, User $user)
    {
        $user->store($request);
        return redirect()->route('users.index')->with('flash', 'registrado');
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user'));
    }
    public function edit_profile(User $user){
        return view('admin.users.edit_profile', compact('user'));
    }
    public function update_profile(User $user, UpdateProfileRequest $request){
        $user->update_profile($user, $request);
        return redirect()->route('users.show', $user)->with('flash', 'actualizado');
    }
    public function update(UpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('flash', 'actualizado');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('flash', 'eliminado');
    }
    public function change_password(ChangePasswordRequest $request, User $user){
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('flash', 'contrasenia');
    }
}
