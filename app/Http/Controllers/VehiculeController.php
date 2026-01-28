<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Affiche la liste des véhicules
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('vehicules.index', compact('vehicules'));
    }

    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        return view('vehicules.create');
    }

    /**
     * Enregistre un nouveau véhicule
     */
    public function store(Request $request)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules|max:20',
            'marque'          => 'required',
            'modele'          => 'required',
            'couleur'         => 'required',
            'annee'           => 'required|integer|min:1900|max:' . date('Y'),
            'kilometrage'     => 'required|integer|min:0',
            'carrosserie'     => 'required',
            'energie'         => 'required',
            'boite'           => 'required',
        ]);

        Vehicule::create($request->all());

        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule ajouté avec succès');
    }

    /**
     * Formulaire de modification
     */
    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Met à jour un véhicule existant
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'immatriculation' => 'required|max:20|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque'          => 'required',
            'modele'          => 'required',
            'couleur'         => 'required',
            'annee'           => 'required|integer|min:1900|max:' . date('Y'),
            'kilometrage'     => 'required|integer|min:0',
            'carrosserie'     => 'required',
            'energie'         => 'required',
            'boite'           => 'required',
        ]);

        $vehicule->update($request->all());

        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule mis à jour avec succès');
    }

    /**
     * Supprime un véhicule
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule supprimé avec succès');
    }
}