<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technicien;

class TechnicienController extends Controller
{
    /**
     *  afficher la liste des techniciens
     */
    public function index()
    {
        $techniciens = Technicien::all();
        return view('techniciens.index', compact('techniciens'));
    }

    /**
     * afficher le formulaire d'ajout d'un technicien
     */
    public function create()
    {
        return view('techniciens.create');
    }

    /**
     *  enrégistrer un technicien
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'specialite' => 'nullable',
        ]);

        Technicien::create($request->all());

        return redirect('/techniciens')
        ->with('success', 'Technicien ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Afficher le formulaire de modification d'un technicien
     */
    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    /**
     *  Mettre à jour un technicien 
     */
    public function update(Request $request, Technicien $technicien)
    {
        $request -> validate([
            'nom' => 'required',
            'prenom' => 'required',
            'specialite' => 'nullable',
        ]);
        $technicien->update($request->all());

        return redirect('/techniciens')
        ->with('success', 'Technicien modifié avec succès');
    }

    /**
     * supprimer un technicien
     */
    public function destroy(Technicien $technicien)
    {
        $technicien->delete();

        return redirect('/techniciens')
        ->with('success', 'Technicien supprimé');
    }

    /**
     * Validation commune
     */
    private function validateTechnicien(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'specialite' => 'nullable',
        ]);
    }
}
