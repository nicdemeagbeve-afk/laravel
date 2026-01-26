@extends('layouts.app')

@section('content')
<h1>Liste des techniciens</h1>

<a href="{{ route('techniciens.create') }}">➕ Ajouter un technicien</a><br><br>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Spécialité</th>
        <th>Actions</th>
    </tr>

    @foreach($techniciens as $technicien)
    <tr>
        <td>{{ $technicien->nom }}</td>
        <td>{{ $technicien->prenom }}</td>
        <td>{{ $technicien->specialite }}</td>
        <td>
            <a href="{{ route('techniciens.edit', $technicien->id) }}"> Modifier</a>

            <form action="{{ route('techniciens.destroy', $technicien->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit"> Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
