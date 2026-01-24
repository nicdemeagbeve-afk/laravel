<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ReparationController;

// Redirige l'accueil vers la liste des véhicules (via le contrôleur)
Route::get('/', [VehiculeController::class, 'index']);

// Routes Ressources
Route::resource('techniciens', TechnicienController::class);
Route::resource('reparations', ReparationController::class);
Route::resource('vehicules', VehiculeController::class);