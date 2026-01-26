@extends('layouts.app')

@section('title', 'Accueil - Garage Pro')

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #1C1C1C 0%, #3A3A3A 100%);
        color: #FFFFFF;
        padding: 80px 40px;
        text-align: center;
        border-bottom: 8px solid #C9A227;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: "⚙️";
        position: absolute;
        font-size: 400px;
        opacity: 0.05;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .hero-title {
        font-size: 4em;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .hero-subtitle {
        font-size: 1.5em;
        color: #C9A227;
        font-weight: 600;
        margin-bottom: 40px;
        position: relative;
        z-index: 1;
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }

    .hero-btn {
        display: inline-block;
        padding: 18px 40px;
        background: #C9A227;
        color: #1C1C1C;
        text-decoration: none;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 3px solid #C9A227;
        transition: all 0.3s;
        font-size: 16px;
    }

    .hero-btn:hover {
        background: transparent;
        color: #C9A227;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(201, 162, 39, 0.3);
    }

    .hero-btn-secondary {
        background: transparent;
        color: #FFFFFF;
        border: 3px solid #FFFFFF;
    }

    .hero-btn-secondary:hover {
        background: #FFFFFF;
        color: #1C1C1C;
    }

    /* Stats Section */
    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin: 50px 0;
    }

    .stat-card {
        background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);
        padding: 40px 30px;
        text-align: center;
        border-left: 6px solid #3A3A3A;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #C9A227 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        border-left-color: #C9A227;
    }

    .stat-card:hover::before {
        opacity: 0.05;
    }

    .stat-icon {
        font-size: 4em;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .stat-number {
        font-size: 3.5em;
        font-weight: 700;
        color: #C9A227;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .stat-label {
        font-size: 16px;
        text-transform: uppercase;
        color: #3A3A3A;
        font-weight: 600;
        letter-spacing: 1px;
        position: relative;
        z-index: 1;
    }

    /* Quick Actions */
    .quick-actions {
        background: #f5f5f5;
        padding: 40px;
        border-left: 6px solid #3A3A3A;
        margin: 50px 0;
    }

    .quick-actions h2 {
        color: #1C1C1C;
        font-size: 2em;
        text-transform: uppercase;
        margin-bottom: 30px;
        border-bottom: 3px solid #C9A227;
        padding-bottom: 15px;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .action-card {
        background: #FFFFFF;
        padding: 30px;
        text-align: center;
        border: 2px solid #B0B0B0;
        transition: all 0.3s;
    }

    .action-card:hover {
        border-color: #C9A227;
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .action-icon {
        font-size: 3.5em;
        margin-bottom: 20px;
        color: #3A3A3A;
    }

    .action-title {
        font-size: 1.3em;
        font-weight: 700;
        color: #1C1C1C;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .action-link {
        display: inline-block;
        padding: 12px 30px;
        background: #3A3A3A;
        color: #FFFFFF;
        text-decoration: none;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s;
        margin-top: 15px;
    }

    .action-link:hover {
        background: #C9A227;
        color: #1C1C1C;
    }

    /* Recent Activity */
    .recent-section {
        margin: 50px 0;
    }

    .recent-section h2 {
        color: #1C1C1C;
        font-size: 2em;
        text-transform: uppercase;
        margin-bottom: 30px;
        border-bottom: 4px solid #3A3A3A;
        padding-bottom: 15px;
    }

    .vehicle-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 30px;
    }

    .vehicle-card {
        background: #FFFFFF;
        border: 3px solid #B0B0B0;
        overflow: hidden;
        transition: all 0.3s;
    }

    .vehicle-card:hover {
        border-color: #C9A227;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .vehicle-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #B0B0B0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4em;
        color: #FFFFFF;
    }

    .vehicle-info {
        padding: 20px;
    }

    .vehicle-immat {
        font-size: 1.2em;
        font-weight: 700;
        color: #C9A227;
        margin-bottom: 10px;
    }

    .vehicle-name {
        font-size: 1.1em;
        color: #1C1C1C;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .vehicle-meta {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #B0B0B0;
        margin-bottom: 15px;
    }

    .vehicle-link {
        display: block;
        text-align: center;
        padding: 12px;
        background: #3A3A3A;
        color: #FFFFFF;
        text-decoration: none;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s;
    }

    .vehicle-link:hover {
        background: #C9A227;
        color: #1C1C1C;
    }

    .reparation-item {
        background: #f9f9f9;
        padding: 20px;
        border-left: 4px solid #3A3A3A;
        margin-bottom: 15px;
        transition: all 0.3s;
    }

    .reparation-item:hover {
        background: #ffffff;
        border-left-color: #C9A227;
        transform: translateX(5px);
    }

    .reparation-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .reparation-date {
        font-weight: 700;
        color: #C9A227;
        font-size: 14px;
    }

    .reparation-vehicle {
        font-weight: 600;
        color: #1C1C1C;
        font-size: 16px;
    }

    .reparation-tech {
        font-size: 14px;
        color: #B0B0B0;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #f5f5f5;
        border: 2px dashed #B0B0B0;
        color: #B0B0B0;
        font-size: 18px;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5em;
        }

        .hero-subtitle {
            font-size: 1.2em;
        }

        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }

        .hero-btn {
            width: 100%;
            max-width: 300px;
        }
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <h1 class="hero-title"> GARAGE </h1>
    <p class="hero-subtitle">Système Professionnel de Gestion Automobile</p>
    <div class="hero-buttons">
        <a href="{{ route('vehicules.create') }}" class="hero-btn">
             Ajouter un Véhicule
        </a>
        <a href="{{ route('reparations.create') }}" class="hero-btn hero-btn-secondary">
             Nouvelle Réparation
        </a>
        <a href="{{ route('techniciens.create') }}" class="hero-btn hero-btn-secondary">
             Ajouter un Technicien
        </a>
    </div>
</div>

<!-- Statistiques -->
<div class="stats-section">
    <div class="stat-card">
        <div class="stat-icon"></div>
        <div class="stat-number">{{ $stats['total_vehicules'] }}</div>
        <div class="stat-label">Véhicules Enregistrés</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon"></div>
        <div class="stat-number">{{ $stats['total_techniciens'] }}</div>
        <div class="stat-label">Techniciens Actifs</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon"></div>
        <div class="stat-number">{{ $stats['total_reparations'] }}</div>
        <div class="stat-label">Réparations Totales</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon"></div>
        <div class="stat-number">{{ $stats['reparations_ce_mois'] }}</div>
        <div class="stat-label">Ce Mois-ci</div>
    </div>
</div>

<!-- Actions Rapides -->
<div class="quick-actions">
    <h2> Actions Rapides</h2>
    <div class="action-grid">
        <div class="action-card">
            <div class="action-icon"></div>
            <div class="action-title">Gérer les Véhicules</div>
            <p style="color: #B0B0B0; margin-bottom: 20px;">Consulter, ajouter ou modifier les véhicules du garage</p>
            <a href="{{ route('vehicules.index') }}" class="action-link">Accéder</a>
        </div>

        <div class="action-card">
            <div class="action-icon"></div>
            <div class="action-title">Gérer les Techniciens</div>
            <p style="color: #B0B0B0; margin-bottom: 20px;">Gérer l'équipe de techniciens et leurs spécialités</p>
            <a href="{{ route('techniciens.index') }}" class="action-link">Accéder</a>
        </div>

        <div class="action-card">
            <div class="action-icon"></div>
            <div class="action-title">Gérer les Réparations</div>
            <p style="color: #B0B0B0; margin-bottom: 20px;">Suivre et enregistrer toutes les interventions</p>
            <a href="{{ route('reparations.index') }}" class="action-link">Accéder</a>
        </div>
    </div>
</div>

<!-- Dernières Réparations -->
@if($dernieres_reparations->count() > 0)
<div class="recent-section">
    <h2> Dernières Réparations</h2>
    @foreach($dernieres_reparations as $reparation)
        <div class="reparation-item">
            <div class="reparation-header">
                <span class="reparation-date"> {{ $reparation->date->format('d/m/Y') }}</span>
                @if($reparation->duree_main_oeuvre)
                    <span style="background: #3A3A3A; color: #FFFFFF; padding: 5px 12px; font-size: 12px; font-weight: 600;">
                         {{ $reparation->duree_main_oeuvre }} min
                    </span>
                @endif
            </div>
            <div class="reparation-vehicle">
                @if($reparation->vehicule)
                     {{ $reparation->vehicule->immatriculation }} - {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}
                @else
                    Véhicule supprimé
                @endif
            </div>
            <div class="reparation-tech">
                @if($reparation->technicien)
                     {{ $reparation->technicien->prenom }} {{ $reparation->technicien->nom }}
                @else
                    Non assigné
                @endif
            </div>
            <p style="color: #1C1C1C; margin-top: 10px; font-size: 14px;">
                {{ Str::limit($reparation->objet_reparation, 100) }}
            </p>
            <a href="{{ route('reparations.show', $reparation) }}" style="color: #C9A227; font-weight: 600; font-size: 13px; text-decoration: none; display: inline-block; margin-top: 10px;">
                Voir les détails →
            </a>
        </div>
    @endforeach
    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('reparations.index') }}" class="btn btn-primary">Voir toutes les réparations</a>
    </div>
</div>
@endif

<!-- Derniers Véhicules -->
@if($derniers_vehicules->count() > 0)
<div class="recent-section">
    <h2> Derniers Véhicules Ajoutés</h2>
    <div class="vehicle-grid">
        @foreach($derniers_vehicules as $vehicule)
            <div class="vehicle-card">
                @if($vehicule->image)
                    <img src="{{ asset('storage/' . $vehicule->image) }}" alt="{{ $vehicule->marque }}" class="vehicle-image">
                @else
                    <div class="vehicle-image"></div>
                @endif
                <div class="vehicle-info">
                    <div class="vehicle-immat">{{ $vehicule->immatriculation }}</div>
                    <div class="vehicle-name">{{ $vehicule->marque }} {{ $vehicule->modele }}</div>
                    <div class="vehicle-meta">
                        <span>
                            @if($vehicule->annee)
                                 {{ $vehicule->annee }}
                            @else
                                 N/A
                            @endif
                        </span>
                        <span>
                            @if($vehicule->energie)
                                 {{ $vehicule->energie }}
                            @else
                                 N/A
                            @endif
                        </span>
                    </div>
                    <a href="{{ route('vehicules.show', $vehicule) }}" class="vehicle-link">Voir le véhicule</a>
                </div>
            </div>
        @endforeach
    </div>
    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('vehicules.index') }}" class="btn btn-primary">Voir tous les véhicules</a>
    </div>
</div>
@endif

<!-- État vide si aucune donnée -->
@if($stats['total_vehicules'] == 0 && $stats['total_techniciens'] == 0 && $stats['total_reparations'] == 0)
<div class="empty-state">
    <div style="font-size: 5em; margin-bottom: 20px;"></div>
    <strong style="display: block; font-size: 1.5em; color: #3A3A3A; margin-bottom: 10px;">
        Bienvenue dans Garage Pro
    </strong>
    <p style="margin-bottom: 30px;">Commencez par ajouter votre premier véhicule ou technicien</p>
    <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
        <a href="{{ route('vehicules.create') }}" class="btn btn-success"> Ajouter un Véhicule</a>
        <a href="{{ route('techniciens.create') }}" class="btn btn-primary"> Ajouter un Technicien</a>
    </div>
</div>
@endif
@endsection