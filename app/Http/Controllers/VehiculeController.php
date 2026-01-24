<?php

namespace App\Http\Controllers;

use App\Models\Vehicule; 
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Affiche la liste des véhicules avec option de recherche.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $vehicules = Vehicule::when($search, function ($query, $search) {
            return $query->where('immatriculation', 'LIKE', "%{$search}%");
        })->paginate(10);

        return view('vehicules.index', compact('vehicules'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('vehicules.create');
    }

    /**
     * Enregistre un nouveau véhicule.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules,immatriculation',
            'marque'          => 'required|string',
            'modele'          => 'required|string',
            'couleur'         => 'required|string',
            'annee'           => 'required|integer',
            'kilometrage'     => 'required|integer',
            'carrosserie'     => 'required|string',
            'energie'         => 'required|string',
            'boite'           => 'required|string',
        ]);

        Vehicule::create($validated);
        
        return redirect()->route('vehicules.index')->with('success', 'Véhicule enregistré avec succès.');
    }

    /**
     * Affiche les détails d'un véhicule.
     */
    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * Affiche le formulaire de modification.
     */
    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Met à jour les informations du véhicule (CORRIGÉ).
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        // On valide TOUS les champs pour qu'ils soient inclus dans l'update
        $validated = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque'          => 'required|string',
            'modele'          => 'required|string',
            'couleur'         => 'required|string',
            'annee'           => 'required|integer',
            'kilometrage'     => 'required|integer',
            'carrosserie'     => 'required|string',
            'energie'         => 'required|string',
            'boite'           => 'required|string',
        ]);

        // Laravel ne mettra à jour que les champs présents dans $validated
        $vehicule->update($validated);
        
        return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour avec succès.');
    }

    /**
     * Supprime le véhicule.
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        
        return redirect()->route('vehicules.index')->with('success', 'Véhicule supprimé.');
    }
}