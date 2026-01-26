@extends('layouts.app')

@section('title', 'Liste des Techniciens')

@section('content')
<div class="page-title">
    <h2> Liste des Techniciens</h2>
    <a href="{{ route('techniciens.create') }}" class="btn btn-success">+ Nouveau Technicien</a>
</div>

<form action="{{ route('techniciens.index') }}" method="GET" class="search-container">
    <input type="text" name="search" placeholder="Rechercher par nom, prénom ou spécialité..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary"> Rechercher</button>
    @if(request('search'))
        <a href="{{ route('techniciens.index') }}" class="btn btn-secondary">✗ Réinitialiser</a>
    @endif
</form>

@if($techniciens->count() > 0)
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Complet</th>
                    <th>Spécialité</th>
                    <th>Nombre de Réparations</th>
                    <th>Date d'ajout</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($techniciens as $technicien)
                <tr>
                    <td><strong style="color: #C9A227;">#{{ $technicien->id }}</strong></td>
                    <td>
                        <strong style="color: #1C1C1C; font-size: 16px;">
                            {{ $technicien->prenom }} {{ strtoupper($technicien->nom) }}
                        </strong>
                    </td>
                    <td>
                        @if($technicien->specialite)
                            <span style="background: #f0f0f0; padding: 6px 12px; border-left: 3px solid #C9A227; font-size: 13px; font-weight: 600; display: inline-block;">
                                {{ $technicien->specialite }}
                            </span>
                        @else
                            <span style="color: #B0B0B0;">Non spécifié</span>
                        @endif
                    </td>
                    <td>
                        <span style="background: #3A3A3A; color: #FFFFFF; padding: 6px 12px; font-weight: 600; font-size: 13px; display: inline-block;">
                            {{ $technicien->reparations->count() }} réparation(s)
                        </span>
                    </td>
                    <td style="color: #B0B0B0; font-size: 14px;">{{ $technicien->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('techniciens.show', $technicien) }}" class="btn btn-primary" style="padding: 10px 16px; font-size: 12px;"> Voir</a>
                            <a href="{{ route('techniciens.edit', $technicien) }}" class="btn btn-warning" style="padding: 10px 16px; font-size: 12px;"> Modifier</a>
                            <form action="{{ route('techniciens.destroy', $technicien) }}" method="POST" onsubmit="return confirm(' Êtes-vous sûr de vouloir supprimer ce technicien ?');">
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
        {{ $techniciens->links() }}
    </div>
@else
    <div class="no-results">
        @if(request('search'))
            <strong>Aucun technicien trouvé</strong><br>
            Aucun résultat pour "{{ request('search') }}"
        @else
            <strong>Aucun technicien enregistré</strong><br>
            Commencez par ajouter votre premier technicien
        @endif
    </div>
@endif
@endsection