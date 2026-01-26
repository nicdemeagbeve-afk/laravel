<?php

use App\Http\Controllers\TechnicienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ReparationController;


// Pour ma page d'acceuille
Route::get('/', function (){
    return view('home');
});


// Véhicules
// Créer un véhicule
Route::get('/vehicules/create', [VehiculeController::class, 'create']);
Route::post('/vehicules', [VehiculeController::class, 'store']);

// Lister les véhicules
Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules.index');

// Modifier un véhicule
Route::get('/vehicules/{id}/edit', [VehiculeController::class, 'edit']);
Route::put('/vehicules/{id}', [VehiculeController::class, 'update']);

// Supprimer un véhicule
Route::delete('/vehicules/{id}', [VehiculeController::class, 'destroy']);


// Techniciens . cette route creer tout  
Route::resource('techniciens', TechnicienController::class);

// Réparations
Route::resource('reparations', App\Http\Controllers\ReparationController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
