<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\ReparationController;

Route::get('/', [App\Http\Controllers\VehiculeController::class, 'index']);

Route::resource('vehicules', VehiculeController::class);
Route::resource('techniciens', TechnicienController::class);
Route::resource('reparations', ReparationController::class);