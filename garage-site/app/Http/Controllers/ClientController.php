<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients',
            'telephone' => 'nullable',
            'adresse' => 'nullable',
        ]);

        Client::create($validated);
        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'telephone' => 'nullable',
            'adresse' => 'nullable',
        ]);

        $client->update($validated);
        return redirect()->route('clients.index')->with('success', 'Client modifié avec succès.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé.');
    }
}
