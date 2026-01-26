@extends('layouts.app')

@section('title', 'Détails du Technicien')

@section('styles')
<style>
    .technicien-header {
        background: linear-gradient(135deg, #3A3A3A 0%, #1C1C1C 100%);
        color: #FFFFFF;
        padding: 40px;
        border-left: 8px solid #C9A227;
        margin-bottom: 40px;
    }

    .technicien-name {
        font-size: 2.5em;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 2px;
    }

    .technicien-specialite {
        font-size: 1.3em;
        color: #C9A227;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: #f9f9f9;
        padding: 30px;
        border-left: 5px solid #3A3A3A;
        text-align: center;
    }

    .stat-number {
        font-size: 3em;
        font-weight: 700;
        color: #C9A227;
        margin-bottom: 10px;
    }

    .stat-label {
        font-size: 14px;
        text-transform: uppercase;
        color: #3A3A3A;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 40px;
    }

    .info-item {
        background: #f9f9f9;
        padding: 20px;
        border-left: 4px solid #B0B0B0;
    }

    .info-label {
        font-size: 12px;
        text-transform: uppercase;
        color: #3A3A3A;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .info-value {
        font-size: 18px;
        color: #1C1C1C;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .technicien-name {
            font-size: 1.8em;
        }
    }
</style>
@endsection

@section('content')
<div class="page-title">
    <h2> Profil du Technicien</h2>
    <div class="action-buttons">
        <a href="{{ route('techniciens.edit', $technicien) }}" class="btn btn-warning"> Modifier</a>
        <form action="{{ route('techniciens.destroy', $technicien) }}" method="POST" onsubmit="return confirm(' Êtes-vous sûr de vouloir supprimer ce technicien ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Supprimer</button>
        </form>
        <a href="{{ route('techniciens.index') }}" class="btn btn-secondary">↩ Retour</a>
    </div>
</div>

<div class="technicien-header">
    <div class="technicien-name">{{ $technicien->prenom }} {{ strtoupper($technicien->nom) }}</div>
    <div class="technicien-specialite">
        @if($technicien->specialite)
             {{ $technicien->specialite }}
        @else
            Technicien Polyvalent
        @endif
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $technicien->reparations->count() }}</div>
        <div class="stat-label"> Réparations Totales</div>
    </div>

    <div class="stat-card">
        <div class="stat-number">
            @php
                $totalMinutes = $technicien->reparations->sum('duree_main_oeuvre');
                $hours = floor($totalMinutes / 60);
            @endphp
            {{ $hours }}h
        </div>
        <div class="stat-label">⏱ Heures Travaillées</div>
    </div>

    <div class="stat-card">
        <div class="stat-number">
            {{ $technicien->reparations->unique('vehicule_id')->count() }}
        </div>
        <div class="stat-label"> Véhicules Traités</div>
    </div>
</div>

<div class="info-grid">
    <div class="info-item">
        <div class="info-label"> Identifiant</div>
        <div class="info-value">#{{ $technicien->id }}</div>
    </div>

    <div class="info-item">
        <div class="info-label"> Nom Complet</div>
        <div class="info-value">{{ $technicien->prenom }} {{ strtoupper($technicien->nom) }}</div>
    </div>

    <div class="info-item">
        <div class="info-label"> Spécialité</div>
        <div class="info-value">{{ $technicien->specialite ?? 'Non spécifié' }}</div>
    </div>

    <div class="info-item">
        <div class="info-label"> Date d'embauche</div>
        <div class="info-value">{{ $technicien->created_at->format('d/m/Y') }}</div>
    </div>

    <div class="info-item">
        <div class="info-label"> Ancienneté</div>
        <div class="info-value">{{ $technicien->created_at->diffForHumans() }}</div>
    </div>

    <div class="info-item">
        <div class="info-label"> Dernière modification</div>
        <div class="info-value">{{ $technicien->updated_at->format('d/m/Y à H:i') }}</div>
    </div>
</div>

@if($technicien->reparations->count() > 0)
<div style="margin-top: 50px;">
    <h3 style="color: #1C1C1C; margin-bottom: 25px; font-size: 1.8em; text-transform: uppercase; border-bottom: 4px solid #3A3A3A; padding-bottom: 15px;">
        🔧 Historique des Réparations
    </h3>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Véhicule</th>
                    <th>Immatriculation</th>
                    <th>Durée</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($technicien->reparations->sortByDesc('date') as $reparation)
                <tr>
                    <td><strong>{{ $reparation->date->format('d/m/Y') }}</strong></td>
                    <td>
                        @if($reparation->vehicule)
                            {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}
                        @else
                            <span style="color: #B0B0B0;">Véhicule supprimé</span>
                        @endif
                    </td>
                    <td>
                        @if($reparation->vehicule)
                            <strong style="color: #C9A227;">{{ $reparation->vehicule->immatriculation }}</strong>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($reparation->duree_main_oeuvre)
                            <span style="background: #3A3A3A; color: #FFFFFF; padding: 6px 12px; font-weight: 600; font-size: 12px; display: inline-block;">
                                {{ $reparation->duree_main_oeuvre }} min
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ Str::limit($reparation->objet_reparation, 50) }}</td>
                    <td>
                        <a href="{{ route('reparations.show', $reparation) }}" class="btn btn-primary" style="padding: 8px 16px; font-size: 12px;"> Détails</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div style="margin-top: 50px;">
    <div class="no-results">
        <strong>Aucune réparation effectuée</strong><br>
        Ce technicien n'a pas encore d'historique de réparations
    </div>
</div>
@endif
@endsection