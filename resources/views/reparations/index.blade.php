@extends('layouts.app')

@section('content')
<h1 class="mb-3">Liste des réparations</h1>
<a href="{{ route('reparations.create') }}" class="btn btn-primary mb-3">Ajouter une réparation</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Véhicule</th>
            <th>Technicien</th>
            <th>Date</th>
            <th>Durée (min)</th>
            <th>Objet</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reparations as $reparation)
        <tr>
            <td>{{ $reparation->vehicule->immatriculation }}</td>
            <td>{{ $reparation->technicien->nom }}</td>
            <td>{{ $reparation->date }}</td>
            <td>{{ $reparation->duree_main_oeuvre }}</td>
            <td>{{ $reparation->objet_reparation }}</td>
            <td>
                <a href="{{ route('reparations.edit', $reparation->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('reparations.destroy', $reparation->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection