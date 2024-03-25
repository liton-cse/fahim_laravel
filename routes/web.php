<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hospital',[HomeController::class,'hospital'])->name('hospital');
Route::get('/patient',[HomeController::class,'patient'])->name('patient');
Route::get('/report',[HomeController::class,'report'])->name('report');
Route::get('/patient/reports',[HomeController::class,'patient_reports'])->name('patient.reports');
Route::get('/hospital/reports',[HomeController::class,'hospital_reports'])->name('hospital.reports');

Route::get('/patient/report/{name}',[HomeController::class,'patient_report'])->name('patient.report');
Route::get('/hospital/report/{id}',[HomeController::class,'hospital_report'])->name('hospital.report');
