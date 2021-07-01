<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// Auth::routes(['verify' => true]);

// ============= recetas ============
Route::get('patient/recipes/{user}', 'RecipeController@index')->name('recipes.index');
Route::get('patient/{user}/recipes/create', 'RecipeController@create')->name('recipes.create');
Route::post('patient/{user}/recipes/store', 'RecipeController@store')->name('recipes.store');
Route::get('patient/{user}/recipes/{recipe}', 'RecipeController@show')->name('recipes.show');
Route::get('patient/{user}/recipes/{recipe}/edit', 'RecipeController@edit')->name('recipes.edit');
Route::put('patient/{user}/recipes/{recipe}/update', 'RecipeController@update')->name('recipes.update');

Route::delete('patient/recipe/{recipe}', 'RecipeController@destroy')->name('recipes.destroy');
// =========== ruta de lisar recetas pero de pacientes

// =========================================
Route::get('/home', 'HomeController@index')->name('home')->middleware('permission:home');


Route::resource('users', 'UserController')->names('users');
Route::put('change_password/{user}', 'UserController@change_password')->name('change_password');
//=========== rutas Ajax ===========
Route::get('user_specialty', 'AjaxController@user_specialty')->name('ajax.user_specialty');
Route::get('doctor/disable_dates', 'AjaxController@disable_dates')
    ->name('doctor.disable_dates');
Route::get('doctor/disable_times', 'AjaxController@disable_times')
	->name('doctor.disable_times');
// ========== rutas de secretario ==========

// ========== rutas de administrador ==========
// ========== editar perfil ===================

Route::get('user/{user}/edit_profile', 'UserController@edit_profile')->name('user.edit_profile');
Route::put('user/{user}/update_profile', 'UserController@update_profile')->name('user.update_profile');
//=========== rutas para hacer el horario del doctor ============
Route::get('doctor/{user}/doctor_schedule', 'DoctorScheduleController@assign')
	->name('doctor.schedule.assign');
Route::post('doctor/{user}/doctor_schedule', 'DoctorScheduleController@assignment')
	->name('doctor.schedule.assignment');
// ==============================================================

Route::resource('patient/{user}/clinic_data', 'ClinicDataController', ['only' => [
    'index', 'create', 'store'
]])->names('clinical.data');
// rutas para notas de historia clinica
Route::resource('patient/{user}/clinic_note', 'ClinicNoteController', ['only' => [
    'store', 'edit', 'update', 'destroy'
]])->names('clinic.note');
// mostrar todas las citas del sistema
Route::get('patient/appointments', 'Admin\PatientController@index')->name('all.appointments');
// mostrar citas del doctor
Route::get('doctor/{user}/appointments', 'DoctorController@doctor_appointments')->name('doctor.appointments');

Route::get('patient/appointment/{user}', 'Admin\PatientController@appointment')->name('back.patient.appointment');

Route::get('patient/{user}/appointment/{appointment}/edit', 'Admin\PatientController@edit_appointment')->name('back.patient.appointment.edit');

Route::put('patient/{user}/appointment/{appointment}/update', 'Admin\PatientController@update_appointment')->name('back.patient.appointment.update');

Route::get('patient/appointments/{user}', 'Admin\PatientController@appointments')->name('back.patient.appointments');
Route::get('patient/invoice/{user}', 'Admin\PatientController@invoice')->name('back.patient.invoice');
//=========editar factura =========
Route::get('patient/{user}/invoice/{invoice}/edit', 'Admin\PatientController@edit_invoice')->name('back.patient.edit.invoice');
Route::put('patient/{user}/invoice/{invoice}/update', 'Admin\PatientController@update_invoice')->name('back.patient.update.invoice');

Route::post('patient/store_appointment', 'Admin\PatientController@store_appointment')->name('back.patient.store_appointment');

Route::resource('specialties', 'SpecialtyController')->names('specialties');
Route::get('doctor/{user}/assign_specialty', 'DoctorController@assign_specialty')->name('doctor.assign_specialty');
Route::put('doctor/{user}/update_specialty', 'DoctorController@update_specialty')->name('doctor.update_specialty');
// ========== rutas de usuario ==========
Route::get('patient', 'PatientController@index')->name('patient.index');
Route::get('appointment', 'PatientController@appointment')->name('patient.appointment');
Route::get('appointments', 'PatientController@appointments')->name('patient.appointments');
Route::get('prescriptions', 'PatientController@prescriptions')->name('patient.prescriptions');
Route::get('invoice', 'PatientController@invoice')->name('patient.invoice');
Route::get('edit_profile', 'PatientController@edit_profile')->name('patient.edit_profile');
Route::put('update_profile/{user}', 'PatientController@update_profile')->name('patient.update_profile');
Route::get('edit_password', 'PatientController@edit_password')->name('patient.edit_password');
Route::put('update_password/{user}', 'PatientController@update_password')->name('patient.update_password');

// ======== falta agregar ==========
Route::post('store_appointment', 'PatientController@store_appointment')->name('store.appointment');

// ====== detalles de receta medica =======

Route::get('prescriptions/{recipe}/prescription_details', 'PatientController@prescription_details')->name('patient.prescription_details');

// =========== ruta de pago con PayPal

Route::get('paypal/pay/{invoice}', 'PaymentController@payWithPayPal')->name('pay_paypal');

Route::get('paypal/status/{id}', 'PaymentController@payPalStatus')->name('paypal.status');