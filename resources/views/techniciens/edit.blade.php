@extends('layouts.app')

@section('content')
<h1>Modifier un technicien</h1>

<form action="{{ route('techniciens.update', $technicien->id) }}" method="POST" class="card p-3">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" value="{{ $technicien->nom }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" name="prenom" value="{{ $technicien->prenom }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Spécialité</label>
        <input type="text" name="specialite" value="{{ $technicien->specialite }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection