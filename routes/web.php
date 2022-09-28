<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;

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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name("home")->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name("home")->middleware('auth');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('administrators', AdministratorController::class);
    Route::resource('user', UserController::class);
    Route::resource('patient', PatientController::class);
    Route::post('patient/{id}/inactive', [PatientController::class, 'inactive'])->name("patient.inactive");
    Route::post('patient/{id}/active', [PatientController::class, 'active'])->name("patient.active");
    Route::post('patient/{id}/fichamedica', [PatientController::class, 'fichamedica'])->name("patient.fichamedica");
    Route::resource('doctor', DoctorController::class);
    Route::post('doctor/{id}/inactive', [DoctorController::class, 'inactive'])->name("doctor.inactive");
    Route::post('doctor/{id}/active', [DoctorController::class, 'active'])->name("doctor.active");
    Route::resource('appointment', AppointmentController::class);
    Route::post('appointment/{id}/unsuccess', [AppointmentController::class, 'unsuccess'])->name("appointment.unsuccess");
    Route::post('appointment/{id}/success', [AppointmentController::class, 'success'])->name("appointment.success");
    Route::post('appointment/{id}/cancel', [AppointmentController::class, 'cancel'])->name("appointment.cancel");
    Route::post('appointment/{id}/successok', [AppointmentController::class, 'successok'])->name("appointment.successok");
  
  });

  



