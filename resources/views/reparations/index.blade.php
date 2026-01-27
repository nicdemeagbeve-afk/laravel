@extends('layouts.app')

@section('content')
<h1>Liste des réparations</h1>

<a href="{{ route('reparations.create') }}">➕ Ajouter une réparation</a><br><br>

@if($reparations->isEmpty())
    <p>Aucune réparation enregistrée.</p>
@else
<table border="1" cellpadding="8">
    <tr>
        <th>Date</th>
        <th>Véhicule</th>
        <th>Technicien</th>
        <th>Durée (min)</th>
        <th>Objet</th>
        <th>Actions</th>
    </tr>

    @foreach($reparations as $reparation)
    <tr>
        <td>{{ $reparation->date }}</td>

        <td>
            {{ $reparation->vehicule->immatriculation }}
            ({{ $reparation->vehicule->marque }})
        </td>

        <td>
            {{ $reparation->technicien->nom ?? '—' }}
        </td>

        <td>{{ $reparation->duree_main_oeuvre ?? '-' }}</td>

        <td>{{ $reparation->objet_reparation }}</td>

<td>
    <!-- Bouton Modifier -->
    <a href="{{ route('reparations.edit', $reparation->id) }}">
        Modifier
    </a>

    <!-- Bouton Supprimer -->
    <form action="{{ route('reparations.destroy', $reparation->id) }}"
          method="POST"
          style="display:inline">
        @csrf
        @method('DELETE')

        <button type="submit"
                onclick="return confirm('Supprimer cette réparation ?')">
            Supprimer
        </button>
    </form>
</td>

    </tr>
    @endforeach
</table>
@endif
@endsection
