@extends('layouts.app')

@section('content')

<div class="main-content create-page">
<h1>Ajouter une réparation</h1>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('reparations.store') }}" method="POST">
    @csrf

    <label>Véhicule :</label><br>
    <select name="vehicule_id" required>
        <option value="">-- Choisir un véhicule --</option>
        @foreach($vehicules as $vehicule)
            <option value="{{ $vehicule->id }}">
                {{ $vehicule->immatriculation }} ({{ $vehicule->marque }})
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Technicien :</label><br>
    <select name="technicien_id">
        <option value="">-- Aucun --</option>
        @foreach($techniciens as $technicien)
            <option value="{{ $technicien->id }}">
                {{ $technicien->nom }} {{ $technicien->prenom }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Date :</label><br>
    <input type="date" name="date" required>
    <br><br>

    <label>Durée main d'œuvre (minutes) :</label><br>
    <input type="number" name="duree_main_oeuvre">
    <br><br>

    <label>Objet de la réparation :</label><br>
    <textarea name="objet_reparation" required></textarea>
    <br><br>

    <button type="submit">Enregistrer</button>
    <a href="{{ route('reparations.index') }}">Annuler</a>
</form>
</div>
@endsection
