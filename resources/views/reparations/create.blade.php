@extends('layouts.app')

@section('content')
<h1>Ajouter une réparation</h1>

<form action="{{ route('reparations.store') }}" method="POST" class="card p-3">
    @csrf
    <div class="mb-3">
        <label class="form-label">Véhicule</label>
        <select name="vehicule_id" class="form-select">
            @foreach($vehicules as $vehicule)
                <option value="{{ $vehicule->id }}">{{ $vehicule->immatriculation }} - {{ $vehicule->marque }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Technicien</label>
        <select name="technicien_id" class="form-select">
            @foreach($techniciens as $technicien)
                <option value="{{ $technicien->id }}">{{ $technicien->nom }} {{ $technicien->prenom }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Durée main d'œuvre (minutes)</label>
        <input type="number" name="duree_main_oeuvre" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Objet de la réparation</label>
        <textarea name="objet_reparation" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection