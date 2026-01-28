<?php

namespace App\Http\Controllers;

use App\Models\Reparation; 
use App\Models\Technicien; 
use App\Models\Vehicule;   // Vérifiez bien si c'est 'vehicule' ou 'Vehicule' selon votre fichier dans Models/
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Affiche la liste des réparations avec pagination.
     */
    public function index(Request $request)
    {
        // Utilisation de paginate(10) pour corriger l'erreur "Method links does not exist"
        $reparations = Reparation::paginate(10); 
        
        return view('reparations.index', compact('reparations'));
    }

    /**
     * Affiche le formulaire de création avec les listes de véhicules et techniciens.
     */
    public function create()
    {
        $techniciens = Technicien::all();
        $vehicules = Vehicule::all(); 

        return view('reparations.create', compact('techniciens', 'vehicules'));
    }

    /**
     * Enregistre une nouvelle réparation.
     */
    public function store(Request $request)
    {
        // Validation des données pour éviter les erreurs SQL
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer',
            'objet_reparation' => 'required|string|max:255',
        ]);

        Reparation::create($validated);

        return redirect()->route('reparations.index')->with('success', 'La réparation a été enregistrée.');  
    }

    /**
     * Affiche les détails d'une réparation.
     */
    public function show(Reparation $reparation)
    {
        return view('reparations.show', compact('reparation')); 
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Reparation $reparation)
    {
        $techniciens = Technicien::all();
        $vehicules = Vehicule::all(); 
        
        return view('reparations.edit', compact('reparation', 'techniciens', 'vehicules'));
    }

    /**
     * Met à jour une réparation.
     */
    public function update(Request $request, Reparation $reparation)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer',
            'objet_reparation' => 'required|string|max:255',
        ]);

        $reparation->update($validated);

        return redirect()->route('reparations.index')->with('success', 'Réparation mise à jour.');
    }

    /**
     * Supprime une réparation.
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->delete();
        
        return redirect()->route('reparations.index')->with('success', 'Réparation supprimée.');
    }
}