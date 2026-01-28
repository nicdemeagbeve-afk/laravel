@extends('layouts.app')

@section('content')
<h1>Ajouter un véhicule</h1>

<form action="{{ route('vehicules.store') }}" method="POST" class="card p-3">
    @csrf

    <div class="mb-3">
        <label class="form-label">Immatriculation</label>
        <input type="text" name="immatriculation" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marque</label>
        <input type="text" name="marque" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Modèle</label>
        <input type="text" name="modele" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Couleur</label>
        <input type="text" name="couleur" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Année</label>
        <input type="number" name="annee" class="form-control" min="1900" max="{{ date('Y') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Kilométrage</label>
        <input type="number" name="kilometrage" class="form-control" min="0">
    </div>

    <div class="mb-3">
        <label class="form-label">Carrosserie</label>
        <input type="text" name="carrosserie" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Énergie</label>
        <select name="energie" class="form-select">
            <option value="Essence">Essence</option>
            <option value="Diesel">Diesel</option>
            <option value="Électrique">Électrique</option>
            <option value="Hybride">Hybride</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Boîte de vitesses</label>
        <select name="boite" class="form-select">
            <option value="Manuelle">Manuelle</option>
            <option value="Automatique">Automatique</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection