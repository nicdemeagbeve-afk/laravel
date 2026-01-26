<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Vehicule;
use App\Models\Technicien;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reparation::with(['vehicule', 'technicien']);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('vehicule', function($q) use ($search) {
                $q->where('marque', 'like', "%{$search}%")
                  ->orWhere('modele', 'like', "%{$search}%")
                  ->orWhere('immatriculation', 'like', "%{$search}%");
            })->orWhereHas('technicien', function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%");
            });
        }

        $reparations = $query->latest()->paginate(10);
        return view('reparations.index', compact('reparations'));
    }

    public function create()
    {
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();
        return view('reparations.create', compact('vehicules', 'techniciens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer|min:0',
            'objet_reparation' => 'required|string'
        ]);

        Reparation::create($validated);

        return redirect()->route('reparations.index')
                        ->with('success', 'Réparation créée avec succès!');
    }

    public function show(Reparation $reparation)
    {
        $reparation->load(['vehicule', 'technicien']);
        return view('reparations.show', compact('reparation'));
    }

    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();
        return view('reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
    }

    public function update(Request $request, Reparation $reparation)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer|min:0',
            'objet_reparation' => 'required|string'
        ]);

        $reparation->update($validated);

        return redirect()->route('reparations.index')
                        ->with('success', 'Réparation modifiée avec succès!');
    }

    public function destroy(Reparation $reparation)
    {
        $reparation->delete();

        return redirect()->route('reparations.index')
                        ->with('success', 'Réparation supprimée avec succès!');
    }
}