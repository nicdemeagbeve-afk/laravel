@extends('layouts.app')

@section('title', 'Détails de la Réparation')

@section('styles')
<style>
    .reparation-header {
        background: linear-gradient(135deg, #3A3A3A 0%, #1C1C1C 100%);
        color: #FFFFFF;
        padding: 40px;
        border-left: 8px solid #C9A227;
        margin-bottom: 40px;
    }

    .reparation-title {
        font-size: 2em;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 15px;
        letter-spacing: 2px;
    }

    .reparation-date {
        font-size: 1.2em;
        color: #C9A227;
        font-weight: 600;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .detail-card {
        background: #f9f9f9;
        padding: 25px;
        border-left: 5px solid #3A3A3A;
    }

    .detail-card-title {
        font-size: 14px;
        text-transform: uppercase;
        color: #3A3A3A;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .detail-card-content {
        font-size: 18px;
        color: #1C1C1C;
        font-weight: 500;
    }

    .description-box {
        background: #FFFFFF;
        padding: 30px;
        border: 2px solid #B0B0B0;
        border-left: 6px solid #C9A227;
        margin-bottom: 40px;
    }

    .description-box h3 {
        color: #1C1C1C;
        font-size: 1.3em;
        text-transform: uppercase;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .description-text {
        color: #1C1C1C;
        font-size: 16px;
        line-height: 1.8;
        white-space: pre-wrap;
    }

    .vehicle-info-box {
        background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);
        padding: 30px;
        border: 3px solid #3A3A3A;
        margin-bottom: 30px;
    }

    .vehicle-info-box h3 {
        color: #1C1C1C;
        font-size: 1.5em;
        text-transform: uppercase;
        margin-bottom: 20px;
        border-bottom: 3px solid #C9A227;
        padding-bottom: 10px;
    }

    .vehicle-details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .vehicle-detail-item {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .vehicle-detail-label {
        font-size: 12px;
        text-transform: uppercase;
        color: #B0B0B0;
        font-weight: 700;
    }

    .vehicle-detail-value {
        font-size: 16px;
        color: #1C1C1C;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .vehicle-details-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="page-title">
    <h2> Détails de la Réparation</h2>
    <div class="action-buttons">
        <a href="{{ route('reparations.edit', $reparation) }}" class="btn btn-warning"> Modifier</a>
        <form action="{{ route('reparations.destroy', $reparation) }}" method="POST" onsubmit="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer cette réparation ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Supprimer</button>
        </form>
        <a href="{{ route('reparations.index') }}" class="btn btn-secondary">↩ Retour</a>
    </div>
</div>

<div class="reparation-header">
    <div class="reparation-title">Réparation #{{ $reparation->id }}</div>
    <div class="reparation-date"> {{ $reparation->date->format('d/m/Y') }} ({{ $reparation->date->diffForHumans() }})</div>
</div>

<div class="detail-grid">
    <div class="detail-card">
        <div class="detail-card-title">
             VÉHICULE
        </div>
        <div class="detail-card-content">
            @if($reparation->vehicule)
                <strong style="color: #C9A227; font-size: 20px;">{{ $reparation->vehicule->immatriculation }}</strong><br>
                <span style="font-size: 16px;">{{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}</span>
            @else
                <span style="color: #B0B0B0;">Véhicule supprimé</span>
            @endif
        </div>
    </div>

    <div class="detail-card">
        <div class="detail-card-title">
             TECHNICIEN
        </div>
        <div class="detail-card-content">
            @if($reparation->technicien)
                <strong>{{ $reparation->technicien->prenom }} {{ strtoupper($reparation->technicien->nom) }}</strong><br>
                @if($reparation->technicien->specialite)
                    <span style="font-size: 14px; color: #B0B0B0;">{{ $reparation->technicien->specialite }}</span>
                @endif
            @else
                <span style="color: #B0B0B0;">Non assigné</span>
            @endif
        </div>
    </div>

    <div class="detail-card">
        <div class="detail-card-title">
             DURÉE
        </div>
        <div class="detail-card-content">
            @if($reparation->duree_main_oeuvre)
                <strong style="color: #C9A227; font-size: 24px;">{{ $reparation->duree_main_oeuvre }}</strong> minutes<br>
                <span style="font-size: 14px; color: #B0B0B0;">
                    ({{ floor($reparation->duree_main_oeuvre / 60) }}h {{ $reparation->duree_main_oeuvre % 60 }}min)
                </span>
            @else
                <span style="color: #B0B0B0;">Non spécifié</span>
            @endif
        </div>
    </div>

    <div class="detail-card">
        <div class="detail-card-title">
             ENREGISTREMENT
        </div>
        <div class="detail-card-content">
            {{ $reparation->created_at->format('d/m/Y à H:i') }}<br>
            <span style="font-size: 14px; color: #B0B0B0;">{{ $reparation->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>

<div class="description-box">
    <h3> DESCRIPTION DÉTAILLÉE DE LA RÉPARATION</h3>
    <div class="description-text">{{ $reparation->objet_reparation }}</div>
</div>

@if($reparation->vehicule)
<div class="vehicle-info-box">
    <h3> Informations Complètes du Véhicule</h3>
    <div class="vehicle-details-grid">
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Immatriculation</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->immatriculation }}</span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Marque & Modèle</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}</span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Couleur</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->couleur ?? 'Non spécifié' }}</span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Année</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->annee ?? 'Non spécifié' }}</span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Kilométrage</span>
            <span class="vehicle-detail-value">
                {{ $reparation->vehicule->kilometrage ? number_format($reparation->vehicule->kilometrage) . ' km' : 'Non spécifié' }}
            </span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Carrosserie</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->carrosserie ?? 'Non spécifié' }}</span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Énergie</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->energie ?? 'Non spécifié' }}</span>
        </div>
        <div class="vehicle-detail-item">
            <span class="vehicle-detail-label">Boîte de vitesses</span>
            <span class="vehicle-detail-value">{{ $reparation->vehicule->boite ?? 'Non spécifié' }}</span>
        </div>
    </div>
    <div style="margin-top: 25px; text-align: center;">
        <a href="{{ route('vehicules.show', $reparation->vehicule) }}" class="btn btn-primary">
             Voir la Fiche Complète du Véhicule
        </a>
    </div>
</div>
@endif

@if($reparation->technicien)
<div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('techniciens.show', $reparation->technicien) }}" class="btn btn-primary">
         Voir le Profil du Technicien
    </a>
</div>
@endif
@endsection