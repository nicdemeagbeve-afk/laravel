@extends('layouts.app')

@section('content')
<h1>Ajouter un technicien</h1>

<form action="{{ route('techniciens.store') }}" method="POST" class="card p-3">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" name="prenom" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Spécialité</label>
        <input type="text" name="specialite" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection