<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function index()
    {
        $techniciens = Technicien::all();
        return view('techniciens.index', compact('techniciens'));
    }

    public function create()
    {
        return view('techniciens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'        => 'required|string|max:255',
            'prenom'     => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        // Si ta colonne 'experience' existe toujours en base de données et qu'elle est obligatoire,
        // on lui donne une valeur par défaut de 0 ici pour éviter les erreurs SQL.
        $validated['experience'] = 0; 

        Technicien::create($validated);

        return redirect()->route('techniciens.index')->with('success', 'Technicien ajouté.');
    }

    public function show(Technicien $technicien)
    {
        return view('techniciens.show', compact('technicien'));
    }

    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, Technicien $technicien)
    {
        $validated = $request->validate([
            'nom'        => 'required|string|max:255',
            'prenom'     => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        $technicien->update($validated);

        return redirect()->route('techniciens.index')->with('success', 'Profil mis à jour.');
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();
        return redirect()->route('techniciens.index')->with('success', 'Technicien supprimé.');
    }
}