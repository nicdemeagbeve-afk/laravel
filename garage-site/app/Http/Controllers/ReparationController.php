<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Vehicule;
use App\Models\Technicien;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Afficher la liste des réparations
     */
    public function index()
    {
        $reparations = Reparation::with(['vehicule', 'technicien'])->paginate(15);
        return view('reparations.index', compact('reparations'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();
        return view('reparations.create', compact('vehicules', 'techniciens'));
    }

    /**
     * Stocker une nouvelle réparation
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'description' => 'required|string|max:1000',
            'prix' => 'nullable|numeric|min:0',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        Reparation::create($validated);
        return redirect()->route('reparations.index')->with('success', 'Réparation ajoutée avec succès.');
    }

    /**
     * Afficher une réparation
     */
    public function show(Reparation $reparation)
    {
        $reparation->load(['vehicule', 'technicien']);
        return view('reparations.show', compact('reparation'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();
        return view('reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
    }

    /**
     * Mettre à jour une réparation
     */
    public function update(Request $request, Reparation $reparation)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'description' => 'required|string|max:1000',
            'prix' => 'nullable|numeric|min:0',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        $reparation->update($validated);
        return redirect()->route('reparations.index')->with('success', 'Réparation mise à jour avec succès.');
    }

    /**
     * Supprimer une réparation
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->delete();
        return redirect()->route('reparations.index')->with('success', 'Réparation supprimée.');
    }
}
