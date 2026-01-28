@extends('layouts.app')

@section('content')
<h1 class="mb-3">Liste des véhicules</h1>
<a href="{{ route('vehicules.create') }}" class="btn btn-primary mb-3">Ajouter un véhicule</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Année</th>
            <th>Kilométrage</th>
            <th>Carrosserie</th>
            <th>Énergie</th>
            <th>Boîte</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicules as $vehicule)
        <tr>
            <td>{{ $vehicule->immatriculation }}</td>
            <td>{{ $vehicule->marque }}</td>
            <td>{{ $vehicule->modele }}</td>
            <td>{{ $vehicule->couleur }}</td>
            <td>{{ $vehicule->annee }}</td>
            <td>{{ $vehicule->kilometrage }}</td>
            <td>{{ $vehicule->carrosserie }}</td>
            <td>{{ $vehicule->energie }}</td>
            <td>{{ $vehicule->boite }}</td>
            <td>
                <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection