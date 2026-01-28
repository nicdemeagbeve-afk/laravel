@extends('layouts.app')

@section('content')
<h1>Modifier un véhicule</h1>

<form action="{{ route('vehicules.update', $vehicule->id) }}" method="POST" class="card p-3">
    @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Immatriculation</label>
        <input type="text" name="immatriculation" value="{{ $vehicule->immatriculation }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marque</label>
        <input type="text" name="marque" value="{{ $vehicule->marque }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Modèle</label>
        <input type="text" name="modele" value="{{ $vehicule->modele }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Couleur</label>
        <input type="text" name="couleur" value="{{ $vehicule->couleur }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Année</label>
        <input type="number" name="annee" value="{{ $vehicule->annee }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Kilométrage</label>
        <input type="number" name="kilometrage" value="{{ $vehicule->kilometrage }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Carrosserie</label>
        <input type="text" name="carrosserie" value="{{ $vehicule->carrosserie }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Énergie</label>
        <select name="energie" class="form-select">
            <option value="Essence" @if($vehicule->energie=="Essence") selected @endif>Essence</option>
            <option value="Diesel" @if($vehicule->energie=="Diesel") selected @endif>Diesel</option>
            <option value="Électrique" @if($vehicule->energie=="Électrique") selected @endif>Électrique</option>
            <option value="Hybride" @if($vehicule->energie=="Hybride") selected @endif>Hybride</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Boîte de vitesses</label>
        <select name="boite" class="form-select">
            <option value="Manuelle" @if($vehicule->boite=="Manuelle") selected @endif>Manuelle</option>
            <option value="Automatique" @if($vehicule->boite=="Automatique") selected @endif>Automatique</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection