<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('vehicules.index', compact('vehicules'));
    }

    public function create()
    {
        return view('vehicules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules',
            'marque' => 'required',
            'modele' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('vehicles', 'public');
            $data['photo'] = $path;
        }

        Vehicule::create($data);

        return redirect()->route('vehicules.index')->with('success', 'Véhicule ajouté avec succès.');
    }

    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required',
            'modele' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($vehicule->photo && \Storage::disk('public')->exists($vehicule->photo)) {
                \Storage::disk('public')->delete($vehicule->photo);
            }
            $path = $request->file('photo')->store('vehicles', 'public');
            $data['photo'] = $path;
        }

        $vehicule->update($data);

        return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour.');
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return redirect()->route('vehicules.index')->with('success', 'Véhicule supprimé.');
    }
}
