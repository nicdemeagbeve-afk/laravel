<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\HomeController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes CRUD
Route::resource('vehicules', VehiculeController::class);
Route::resource('techniciens', TechnicienController::class);
Route::resource('reparations', ReparationController::class);