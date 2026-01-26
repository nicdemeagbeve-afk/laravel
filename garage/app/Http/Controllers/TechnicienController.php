<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function index(Request $request)
    {
        $query = Technicien::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%")
                  ->orWhere('specialite', 'like', "%{$search}%");
        }

        $techniciens = $query->latest()->paginate(10);
        return view('techniciens.index', compact('techniciens'));
    }

    public function create()
    {
        return view('techniciens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255'
        ]);

        Technicien::create($validated);

        return redirect()->route('techniciens.index')
                        ->with('success', 'Technicien créé avec succès!');
    }

    public function show(Technicien $technicien)
    {
        $technicien->load('reparations.vehicule');
        return view('techniciens.show', compact('technicien'));
    }

    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, Technicien $technicien)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255'
        ]);

        $technicien->update($validated);

        return redirect()->route('techniciens.index')
                        ->with('success', 'Technicien modifié avec succès!');
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();

        return redirect()->route('techniciens.index')
                        ->with('success', 'Technicien supprimé avec succès!');
    }
}