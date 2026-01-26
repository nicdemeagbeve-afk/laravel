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
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('techniciens', 'public');
            $data['photo'] = $path;
        }

        Technicien::create($data);

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
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($technicien->photo && \Storage::disk('public')->exists($technicien->photo)) {
                \Storage::disk('public')->delete($technicien->photo);
            }
            $path = $request->file('photo')->store('techniciens', 'public');
            $data['photo'] = $path;
        }

        $technicien->update($data);

        return redirect()->route('techniciens.index')->with('success', 'Technicien mis à jour.');
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();
        return redirect()->route('techniciens.index')->with('success', 'Technicien supprimé.');
    }
}
