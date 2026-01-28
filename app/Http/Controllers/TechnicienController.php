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
        Technicien::create($request->all());
        return redirect()->route('techniciens.index');
    }

    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, Technicien $technicien)
    {
        $technicien->update($request->all());
        return redirect()->route('techniciens.index');
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();
        return redirect()->route('techniciens.index');
    }
}