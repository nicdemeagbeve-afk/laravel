<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
class VehiculeController extends Controller
{
    public function create()
    {
        return view('vehicules.create');
    }

    public function store(Request $request)
    {
        Vehicule::create([
          'immatriculation' => $request->immatriculation,
          'marque' => $request->marque,
          'modele' => $request->modele,
          'couleur'=>$request->couleur,
          'annee'=> $request->annee,
          'kilometrage'=>$request->kilometrage,
          'carrosserie'=>$request->carrosserie,
          'energie'=>$request->energie,
          'boite'=> $request->boite,
        ]);
        return redirect()->back()->with('success', 'Véhicule ajouté');
    }

    public function index()
    {
        $vehicules = Vehicule::all();
        return view('vehicules.index', compact('vehicules'));

    }
    public function edit($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        return view('vehicules.edit', compact('vehicule'));
    }
    public function update(Request $request, $id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $vehicule->update([
         'immatriculation' => $request->immatriculation,
         'marque' => $request->marque,
        'modele' => $request->modele,
        'couleur' => $request->couleur,
        'annee' => $request->annee,
        'kilometrage' => $request->kilometrage,
        'carrosserie' => $request->carrosserie,
        'energie' => $request->energie,
        'boite' => $request->boite, 
        ]);
        return redirect('/vehicules');
    }

    public function destroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();

        return redirect()->route('vehicules.index')
                         ->with('success', 'Véhicule supprimé avec succès');
    }
}


