<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::view('/about', 'about');
Route::view('/services', 'services');
Auth::routes(['register' => false]); 

Route::middleware(['auth', 'checksuperadmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', App\Http\Livewire\Admins\Dashboard::class)->name('admin_dashboard');
    Route::get('/employees', App\Http\Livewire\Admins\Employees::class)->name('employees');
    Route::get('/patients', App\Http\Livewire\Admins\Patients::class)->name('admin_patients');
    Route::get('/blocks', App\Http\Livewire\Admins\Blocks::class)->name('blocks');
    Route::get('/departments', App\Http\Livewire\Admins\Departments::class)->name('departments');
    Route::get('/rooms', App\Http\Livewire\Admins\Rooms::class)->name('Rooms');
    Route::get('/beds', App\Http\Livewire\Admins\Beds::class)->name('patients_beds');
    Route::get('/appointment', App\Http\Livewire\Admins\Appointment2::class)->name('appointment');
    Route::get('/requestedappointments', App\Http\Livewire\Admins\RequestedAppointments::class)->name('requestedAppointment');
    Route::get('/patientBills', App\Http\Livewire\Admins\Bills::class)->name('patient_bills');

});