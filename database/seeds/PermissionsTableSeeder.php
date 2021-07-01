<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'patient.appointment']);
        Permission::create(['name' => 'patient.appointments']);
        Permission::create(['name' => 'change_password']);
        Permission::create(['name' => 'doctor.appointments']);
        Permission::create(['name' => 'doctor.assign_specialty']);
        Permission::create(['name' => 'doctor.schedule.assignment']);
        Permission::create(['name' => 'doctor.schedule.assign']);
        Permission::create(['name' => 'doctor.update_specialty']);
        Permission::create(['name' => 'patient.edit_password']);
        Permission::create(['name' => 'patient.edit_profile']);
        Permission::create(['name' => 'home']);
        Permission::create(['name' => 'patient.invoice']);
        Permission::create(['name' => 'patient.index']);
        Permission::create(['name' => 'back.patient.appointment']);
        Permission::create(['name' => 'all.appointments']);
        Permission::create(['name' => 'back.patient.appointments']);
        Permission::create(['name' => 'back.patient.invoice']);
        Permission::create(['name' => 'back.patient.store_appointment']);
        Permission::create(['name' => 'back.patient.appointment.edit']);
        Permission::create(['name' => 'back.patient.appointment.update']);
        Permission::create(['name' => 'clinical.data.index']);
        Permission::create(['name' => 'clinical.data.store']);
        Permission::create(['name' => 'clinical.data.create']);
        Permission::create(['name' => 'clinic.note.store']);
        Permission::create(['name' => 'clinic.note.update']);
        Permission::create(['name' => 'clinic.note.destroy']);
        Permission::create(['name' => 'clinic.note.edit']);
        Permission::create(['name' => 'back.patient.edit.invoice']);
        Permission::create(['name' => 'back.patient.update.invoice']);
        Permission::create(['name' => 'patient.prescriptions']);
        Permission::create(['name' => 'specialties.index']);
        Permission::create(['name' => 'specialties.store']);
        Permission::create(['name' => 'specialties.create']);
        Permission::create(['name' => 'specialties.update']);
        Permission::create(['name' => 'specialties.destroy']);
        Permission::create(['name' => 'specialties.show']);
        Permission::create(['name' => 'specialties.edit']);
        Permission::create(['name' => 'store.appointment']);
        Permission::create(['name' => 'patient.update_password']);
        Permission::create(['name' => 'patient.update_profile']);
        Permission::create(['name' => 'user.edit_profile']);
        Permission::create(['name' => 'user.update_profile']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.edit']);

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo([
            'patient.appointment',
            'patient.appointments',
            'change_password',
            'doctor.appointments',
            'doctor.assign_specialty',
            'doctor.schedule.assignment',
            'doctor.schedule.assign',
            'doctor.update_specialty',
            'patient.edit_password',
            'patient.edit_profile',
            'home',
            'patient.invoice',
            'patient.index',
            'back.patient.appointment',
            'all.appointments',
            'back.patient.appointments',
            'back.patient.invoice',
            'back.patient.store_appointment',
            'back.patient.appointment.edit',
            'back.patient.appointment.update',
            'clinical.data.index',
            'clinical.data.store',
            'clinical.data.create',
            'clinic.note.store',
            'clinic.note.update',
            'clinic.note.destroy',
            'clinic.note.edit',
            'back.patient.edit.invoice',
            'back.patient.update.invoice',
            'patient.prescriptions',
            'specialties.index',
            'specialties.store',
            'specialties.create',
            'specialties.update',
            'specialties.destroy',
            'specialties.show',
            'specialties.edit',
            'store.appointment',
            'patient.update_password',
            'patient.update_profile',
            'user.edit_profile',
            'user.update_profile',
            'users.store',
            'users.index',
            'users.create',
            'users.destroy',
            'users.update',
            'users.show',
            'users.edit'
        ]);
        $secretary = Role::create(['name' => 'Secretary']);
        $secretary->givePermissionTo([
            'patient.appointment',
            'patient.appointments',
            'change_password',
            'doctor.appointments',
            'doctor.assign_specialty',
            'doctor.schedule.assignment',
            'doctor.schedule.assign',
            'doctor.update_specialty',
            'patient.edit_password',
            'patient.edit_profile',
            'home',
            'patient.invoice',
            'patient.index',
            'back.patient.appointment',
            'all.appointments',
            'back.patient.appointments',
            'back.patient.invoice',
            'back.patient.store_appointment',
            'back.patient.appointment.edit',
            'back.patient.appointment.update',
            'clinical.data.index',
            'clinical.data.store',
            'clinical.data.create',
            'clinic.note.store',
            'clinic.note.update',
            'clinic.note.destroy',
            'clinic.note.edit',
            'back.patient.edit.invoice',
            'back.patient.update.invoice',
            'patient.prescriptions',
            'specialties.index',
            'specialties.store',
            'specialties.create',
            'specialties.update',
            'specialties.destroy',
            'specialties.show',
            'specialties.edit',
            'store.appointment',
            'patient.update_password',
            'patient.update_profile',
            'user.edit_profile',
            'user.update_profile',
            'users.store',
            'users.index',
            'users.create',
            'users.destroy',
            'users.update',
            'users.show',
            'users.edit'
        ]);

        $doctor = Role::create(['name' => 'Doctor']);
        $doctor->givePermissionTo([
            'change_password',
            'doctor.appointments',
            'doctor.assign_specialty',
            'doctor.schedule.assignment',
            'doctor.schedule.assign',
            'doctor.update_specialty',
            'home',
            'back.patient.appointment',
            'all.appointments',
            'back.patient.appointments',
            'back.patient.invoice',
            'back.patient.store_appointment',
            'back.patient.appointment.edit',
            'back.patient.appointment.update',
            'clinical.data.index',
            'clinical.data.store',
            'clinical.data.create',
            'clinic.note.store',
            'clinic.note.update',
            'clinic.note.destroy',
            'clinic.note.edit',
            'back.patient.edit.invoice',
            'back.patient.update.invoice',
            'specialties.index',
            'specialties.store',
            'specialties.create',
            'specialties.update',
            'specialties.destroy',
            'specialties.show',
            'specialties.edit',
            'user.edit_profile',
            'user.update_profile',
            'users.store',
            'users.index',
            'users.create',
            'users.destroy',
            'users.update',
            'users.show',
            'users.edit'
        ]);

        $patient = Role::create(['name' => 'Patient']);
        $patient->givePermissionTo([
            'patient.index',
            'patient.appointment',
            'patient.appointments',
            'patient.prescriptions',
            'patient.invoice',
            'patient.edit_profile',
            'patient.update_profile',
            'patient.edit_password',
            'patient.update_password',
            'store.appointment'
        ]);
        //User Admin
        $user = User::find(1); //admin
        $user->profile()->create([
            'birthdate'=> Carbon::now()
        ]);
        $profile = $user->profile;
        $profile->image()->create([
                'url' => '/image/avatar.png',
        ]);
        $user->assignRole('Admin');
        //User Secretary
        $user = User::find(2); //admin
        $user->profile()->create([
            'birthdate'=> Carbon::now()
        ]);
        $profile = $user->profile;
        $profile->image()->create([
                'url' => '/image/avatar.png',
        ]);
        $user->assignRole('Secretary');
        //User Doctor
        $user = User::find(3); //admin
        $user->profile()->create([
            'birthdate'=> Carbon::now()
        ]);
        $profile = $user->profile;
        $profile->image()->create([
                'url' => '/image/avatar.png',
        ]);
        $user->assignRole('Doctor');
        //User Patient
        $user = User::find(4); //admin
        $user->profile()->create([
            'birthdate'=> Carbon::now()
        ]);
        $profile = $user->profile;
        $profile->image()->create([
                'url' => '/image/avatar.png',
        ]);
        $user->assignRole('Patient');
    }
}
