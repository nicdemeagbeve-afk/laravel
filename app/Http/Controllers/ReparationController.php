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
        $reparations = Reparation::with(['vehicule', 'technicien'])->get();
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
     * Enregistrer une réparation
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer',
            'objet_reparation' => 'required'
        ]);

        Reparation::create($request->all());

        return redirect()
            ->route('reparations.index')
            ->with('success', 'Réparation enregistrée avec succès');
    }

    /**
     * Supprimer une réparation
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->delete();

        return redirect()
            ->route('reparations.index')
            ->with('success', 'Réparation supprimée');
    }

    /**
 * Formulaire de modification
 */
    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();

        return view('reparations.edit',compact('reparation', 'vehicules', 'techniciens')
         );
    }

    /**
 * Mise à jour d'une réparation
 */
public function update(Request $request, Reparation $reparation)
{
    $request->validate([
        'vehicule_id' => 'required|exists:vehicules,id',
        'technicien_id' => 'nullable|exists:techniciens,id',
        'date' => 'required|date',
        'duree_main_oeuvre' => 'nullable|integer',
        'objet_reparation' => 'required'
    ]);

    $reparation->update($request->all());

    return redirect()
        ->route('reparations.index')
        ->with('success', 'Réparation modifiée avec succès');
}

}



