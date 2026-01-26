@extends('layouts.app')

@section('title', 'Liste des Réparations')

@section('content')
<div class="page-title">
    <h2> Liste des Réparations</h2>
    <a href="{{ route('reparations.create') }}" class="btn btn-success">+ Nouvelle Réparation</a>
</div>

<form action="{{ route('reparations.index') }}" method="GET" class="search-container">
    <input type="text" name="search" placeholder="Rechercher par véhicule (marque, modèle, immatriculation) ou technicien..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary"> Rechercher</button>
    @if(request('search'))
        <a href="{{ route('reparations.index') }}" class="btn btn-secondary">✗ Réinitialiser</a>
    @endif
</form>

@if($reparations->count() > 0)
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Véhicule</th>
                    <th>Immatriculation</th>
                    <th>Technicien</th>
                    <th>Durée</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reparations as $reparation)
                <tr>
                    <td><strong style="color: #C9A227;">#{{ $reparation->id }}</strong></td>
                    <td><strong>{{ $reparation->date->format('d/m/Y') }}</strong></td>
                    <td>
                        @if($reparation->vehicule)
                            <strong style="color: #1C1C1C;">
                                {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}
                            </strong>
                        @else
                            <span style="color: #B0B0B0;">Véhicule supprimé</span>
                        @endif
                    </td>
                    <td>
                        @if($reparation->vehicule)
                            <span style="background: #f0f0f0; padding: 6px 12px; border-left: 3px solid #3A3A3A; font-size: 13px; font-weight: 600; display: inline-block;">
                                {{ $reparation->vehicule->immatriculation }}
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($reparation->technicien)
                            {{ $reparation->technicien->prenom }} {{ strtoupper($reparation->technicien->nom) }}
                            @if($reparation->technicien->specialite)
                                <br><small style="color: #B0B0B0; font-size: 12px;">{{ $reparation->technicien->specialite }}</small>
                            @endif
                        @else
                            <span style="color: #B0B0B0;">Non assigné</span>
                        @endif
                    </td>
                    <td>
                        @if($reparation->duree_main_oeuvre)
                            <span style="background: #3A3A3A; color: #FFFFFF; padding: 6px 12px; font-weight: 600; font-size: 13px; display: inline-block;">
                                {{ $reparation->duree_main_oeuvre }} min
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td style="max-width: 300px;">{{ Str::limit($reparation->objet_reparation, 60) }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('reparations.show', $reparation) }}" class="btn btn-primary" style="padding: 10px 16px; font-size: 12px;"> Voir</a>
                            <a href="{{ route('reparations.edit', $reparation) }}" class="btn btn-warning" style="padding: 10px 16px; font-size: 12px;"> Modifier</a>
                            <form action="{{ route('reparations.destroy', $reparation) }}" method="POST" onsubmit="return confirm(' Êtes-vous sûr de vouloir supprimer cette réparation ?');">
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
        {{ $reparations->links() }}
    </div>
@else
    <div class="no-results">
        @if(request('search'))
            <strong>Aucune réparation trouvée</strong><br>
            Aucun résultat pour "{{ request('search') }}"
        @else
            <strong>Aucune réparation enregistrée</strong><br>
            Commencez par ajouter votre première réparation
        @endif
    </div>
@endif
@endsection