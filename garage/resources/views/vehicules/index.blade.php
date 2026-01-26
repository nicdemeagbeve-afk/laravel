@extends('layouts.app')

@section('title', 'Liste des Véhicules')

@section('content')
<div class="page-title">
    <h2> Liste des Véhicules</h2>
    <a href="{{ route('vehicules.create') }}" class="btn btn-success">+ Nouveau Véhicule</a>
</div>

<form action="{{ route('vehicules.index') }}" method="GET" class="search-container">
    <input type="text" name="search" placeholder="Rechercher par marque, modèle ou immatriculation..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary"> Rechercher</button>
    @if(request('search'))
        <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">✗ Réinitialiser</a>
    @endif
</form>

@if($vehicules->count() > 0)
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Couleur</th>
                    <th>Année</th>
                    <th>Kilométrage</th>
                    <th>Énergie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicules as $vehicule)
                <tr>
                    <td>
                        @if($vehicule->image)
                            <img src="{{ asset('storage/' . $vehicule->image) }}" alt="{{ $vehicule->marque }}" style="width: 70px; height: 70px; object-fit: cover; border: 2px solid #3A3A3A;">
                        @else
                            <div style="width: 70px; height: 70px; background: #B0B0B0; display: flex; align-items: center; justify-content: center; color: #FFFFFF; font-size: 24px; border: 2px solid #3A3A3A;"></div>
                        @endif
                    </td>
                    <td><strong style="color: #1C1C1C;">{{ $vehicule->immatriculation }}</strong></td>
                    <td>{{ $vehicule->marque }}</td>
                    <td>{{ $vehicule->modele }}</td>
                    <td>{{ $vehicule->couleur ?? '-' }}</td>
                    <td>{{ $vehicule->annee ?? '-' }}</td>
                    <td>{{ $vehicule->kilometrage ? number_format($vehicule->kilometrage) . ' km' : '-' }}</td>
                    <td>
                        @if($vehicule->energie)
                            <span style="background: #f0f0f0; padding: 5px 10px; border-left: 3px solid #C9A227; font-size: 12px; font-weight: 600;">{{ $vehicule->energie }}</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('vehicules.show', $vehicule) }}" class="btn btn-primary" style="padding: 10px 16px; font-size: 12px;"> Voir</a>
                            <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-warning" style="padding: 10px 16px; font-size: 12px;"> Modifier</a>
                            <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 10px 16px; font-size: 12px;"> Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $vehicules->links() }}
    </div>
@else
    <div class="no-results">
        @if(request('search'))
            <strong>Aucun véhicule trouvé</strong><br>
            Aucun résultat pour "{{ request('search') }}"
        @else
            <strong>Aucun véhicule enregistré</strong><br>
            Commencez par ajouter votre premier véhicule
        @endif
    </div>
@endif
@endsection