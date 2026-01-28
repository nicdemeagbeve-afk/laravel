@extends('layouts.app')

@section('content')
<h1 class="mb-3">Liste des techniciens</h1>
<a href="{{ route('techniciens.create') }}" class="btn btn-primary mb-3">Ajouter un technicien</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Spécialité</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($techniciens as $technicien)
        <tr>
            <td>{{ $technicien->nom }}</td>
            <td>{{ $technicien->prenom }}</td>
            <td>{{ $technicien->specialite }}</td>
            <td>
                <a href="{{ route('techniciens.edit', $technicien->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('techniciens.destroy', $technicien->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection