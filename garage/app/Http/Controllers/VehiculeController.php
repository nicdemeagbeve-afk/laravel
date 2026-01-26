<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiculeController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicule::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('marque', 'like', "%{$search}%")
                  ->orWhere('modele', 'like', "%{$search}%")
                  ->orWhere('immatriculation', 'like', "%{$search}%");
        }

        $vehicules = $query->latest()->paginate(10);
        return view('vehicules.index', compact('vehicules'));
    }

    public function create()
    {
        return view('vehicules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'couleur' => 'nullable|string',
            'annee' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'kilometrage' => 'nullable|integer|min:0',
            'carrosserie' => 'nullable|string',
            'energie' => 'nullable|string',
            'boite' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('vehicules', 'public');
        }

        Vehicule::create($validated);

        return redirect()->route('vehicules.index')
                        ->with('success', 'Véhicule créé avec succès!');
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
        $validated = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required|string',
            'modele' => 'required|string',
            'couleur' => 'nullable|string',
            'annee' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'kilometrage' => 'nullable|integer|min:0',
            'carrosserie' => 'nullable|string',
            'energie' => 'nullable|string',
            'boite' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($vehicule->image) {
                Storage::disk('public')->delete($vehicule->image);
            }
            $validated['image'] = $request->file('image')->store('vehicules', 'public');
        }

        $vehicule->update($validated);

        return redirect()->route('vehicules.index')
                        ->with('success', 'Véhicule modifié avec succès!');
    }

    public function destroy(Vehicule $vehicule)
    {
        if ($vehicule->image) {
            Storage::disk('public')->delete($vehicule->image);
        }
        
        $vehicule->delete();

        return redirect()->route('vehicules.index')
                        ->with('success', 'Véhicule supprimé avec succès!');
    }
}