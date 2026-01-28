<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Vehicule;
use App\Models\Technicien;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    public function index()
    {
        $reparations = Reparation::with(['vehicule', 'technicien'])->get();
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
        $request->validate([
            'vehicule_id'       => 'required|exists:vehicules,id',
            'technicien_id'     => 'required|exists:techniciens,id',
            'date'              => 'required|date',
            'duree_main_oeuvre' => 'required|integer|min:1',
            'objet_reparation'  => 'required|string|max:255',
        ]);

        Reparation::create($request->all());

        return redirect()->route('reparations.index')
                         ->with('success', 'Réparation ajoutée avec succès');
    }

    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();
        return view('reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
    }

    public function update(Request $request, Reparation $reparation)
    {
        $request->validate([
            'vehicule_id'       => 'required|exists:vehicules,id',
            'technicien_id'     => 'required|exists:techniciens,id',
            'date'              => 'required|date',
            'duree_main_oeuvre' => 'required|integer|min:1',
            'objet_reparation'  => 'required|string|max:255',
        ]);

        $reparation->update($request->all());

        return redirect()->route('reparations.index')
                         ->with('success', 'Réparation mise à jour avec succès');
    }

    public function destroy(Reparation $reparation)
    {
        $reparation->delete();
        return redirect()->route('reparations.index')
                         ->with('success', 'Réparation supprimée avec succès');
    }
}