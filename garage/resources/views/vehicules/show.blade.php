@extends('layouts.app')

@section('title', 'Détails du Véhicule')

@section('styles')
<style>
    .vehicle-details {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        margin-top: 30px;
    }

    .detail-section {
        background: #f9f9f9;
        padding: 30px;
        border-left: 5px solid #3A3A3A;
    }

    .detail-item {
        padding: 18px 0;
        border-bottom: 2px solid #e0e0e0;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 700;
        color: #3A3A3A;
        margin-bottom: 8px;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
    }

    .detail-value {
        color: #1C1C1C;
        font-size: 20px;
        font-weight: 500;
    }

    /* Cube 3D Industriel */
    .cube-container {
        perspective: 1200px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 450px;
        background: linear-gradient(135deg, #1C1C1C 0%, #3A3A3A 100%);
        padding: 40px;
        border: 5px solid #C9A227;
    }

    .cube {
        width: 320px;
        height: 320px;
        position: relative;
        transform-style: preserve-3d;
        animation: rotate 12s infinite linear;
    }

    .cube-face {
        position: absolute;
        width: 320px;
        height: 320px;
        background-size: cover;
        background-position: center;
        border: 4px solid #C9A227;
        box-shadow: 0 0 30px rgba(201, 162, 39, 0.5);
    }

    .cube-face-front  { transform: rotateY(  0deg) translateZ(160px); }
    .cube-face-back   { transform: rotateY(180deg) translateZ(160px); }
    .cube-face-right  { transform: rotateY( 90deg) translateZ(160px); }
    .cube-face-left   { transform: rotateY(-90deg) translateZ(160px); }
    .cube-face-top    { transform: rotateX( 90deg) translateZ(160px); }
    .cube-face-bottom { transform: rotateX(-90deg) translateZ(160px); }

    @keyframes rotate {
        0% { transform: rotateX(0deg) rotateY(0deg); }
        100% { transform: rotateX(360deg) rotateY(360deg); }
    }

    .no-image-cube {
        background: linear-gradient(135deg, #3A3A3A 0%, #1C1C1C 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #C9A227;
        font-size: 60px;
        font-weight: bold;
    }

    .info-badge {
        display: inline-block;
        padding: 8px 16px;
        background: #3A3A3A;
        color: #FFFFFF;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 5px;
    }

    @media (max-width: 968px) {
        .vehicle-details {
            grid-template-columns: 1fr;
        }
        
        .cube {
            width: 240px;
            height: 240px;
        }
        
        .cube-face {
            width: 240px;
            height: 240px;
        }
        
        .cube-face-front  { transform: rotateY(  0deg) translateZ(120px); }
        .cube-face-back   { transform: rotateY(180deg) translateZ(120px); }
        .cube-face-right  { transform: rotateY( 90deg) translateZ(120px); }
        .cube-face-left   { transform: rotateY(-90deg) translateZ(120px); }
        .cube-face-top    { transform: rotateX( 90deg) translateZ(120px); }
        .cube-face-bottom { transform: rotateX(-90deg) translateZ(120px); }
    }
</style>
@endsection

@section('content')
<div class="page-title">
    <h2> Détails du Véhicule</h2>
    <div class="action-buttons">
        <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-warning"> Modifier</a>
        <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST" onsubmit="return confirm(' Êtes-vous sûr de vouloir supprimer ce véhicule ? Cette action est irréversible.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Supprimer</button>
        </form>
        <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">↩ Retour</a>
    </div>
</div>

<div class="vehicle-details">
    <div class="detail-section">
        <h3 style="color: #1C1C1C; margin-bottom: 25px; font-size: 1.5em; text-transform: uppercase; border-bottom: 3px solid #C9A227; padding-bottom: 15px;"> Informations Générales</h3>
        
        <div class="detail-item">
            <div class="detail-label"> Immatriculation</div>
            <div class="detail-value">{{ $vehicule->immatriculation }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Marque</div>
            <div class="detail-value">{{ $vehicule->marque }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Modèle</div>
            <div class="detail-value">{{ $vehicule->modele }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Couleur</div>
            <div class="detail-value">{{ $vehicule->couleur ?? 'Non spécifié' }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Année</div>
            <div class="detail-value">{{ $vehicule->annee ?? 'Non spécifié' }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Kilométrage</div>
            <div class="detail-value">
                @if($vehicule->kilometrage)
                    {{ number_format($vehicule->kilometrage) }} km
                @else
                    Non spécifié
                @endif
            </div>
        </div>

        <h3 style="color: #1C1C1C; margin: 30px 0 25px 0; font-size: 1.5em; text-transform: uppercase; border-bottom: 3px solid #C9A227; padding-bottom: 15px;"> Caractéristiques Techniques</h3>

        <div class="detail-item">
            <div class="detail-label"> Carrosserie</div>
            <div class="detail-value">
                @if($vehicule->carrosserie)
                    <span class="info-badge">{{ $vehicule->carrosserie }}</span>
                @else
                    Non spécifié
                @endif
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Énergie</div>
            <div class="detail-value">
                @if($vehicule->energie)
                    <span class="info-badge" style="background: #C9A227; color: #1C1C1C;">{{ $vehicule->energie }}</span>
                @else
                    Non spécifié
                @endif
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Boîte de vitesses</div>
            <div class="detail-value">
                @if($vehicule->boite)
                    <span class="info-badge">{{ $vehicule->boite }}</span>
                @else
                    Non spécifié
                @endif
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label"> Date d'enregistrement</div>
            <div class="detail-value" style="font-size: 16px;">{{ $vehicule->created_at->format('d/m/Y à H:i') }}</div>
        </div>
    </div>

    <div>
        <h3 style="color: #1C1C1C; margin-bottom: 25px; font-size: 1.5em; text-align: center; text-transform: uppercase; border-bottom: 3px solid #C9A227; padding-bottom: 15px;"> Visualisation 3D</h3>
        <div class="cube-container">
            @if($vehicule->image)
            <div class="cube">
                @php
                    $imageUrl = asset('storage/' . $vehicule->image);
                @endphp
                <div class="cube-face cube-face-front" style="background-image: url('{{ $imageUrl }}');"></div>
                <div class="cube-face cube-face-back" style="background-image: url('{{ $imageUrl }}');"></div>
                <div class="cube-face cube-face-right" style="background-image: url('{{ $imageUrl }}');"></div>
                <div class="cube-face cube-face-left" style="background-image: url('{{ $imageUrl }}');"></div>
                <div class="cube-face cube-face-top" style="background-image: url('{{ $imageUrl }}');"></div>
                <div class="cube-face cube-face-bottom" style="background-image: url('{{ $imageUrl }}');"></div>
            </div>
            @else
            <div class="cube">
                <div class="cube-face cube-face-front no-image-cube"></div>
                <div class="cube-face cube-face-back no-image-cube"></div>
                <div class="cube-face cube-face-right no-image-cube"></div>
                <div class="cube-face cube-face-left no-image-cube"></div>
                <div class="cube-face cube-face-top no-image-cube"></div>
                <div class="cube-face cube-face-bottom no-image-cube"></div>
            </div>
            @endif
        </div>
        <p style="text-align: center; color: #B0B0B0; margin-top: 20px; font-style: italic;">Animation 3D en rotation continue</p>
    </div>
</div>

@if($vehicule->reparations->count() > 0)
<div style="margin-top: 60px;">
    <h3 style="color: #1C1C1C; margin-bottom: 25px; font-size: 1.8em; text-transform: uppercase; border-bottom: 4px solid #3A3A3A; padding-bottom: 15px;"> Historique des Réparations</h3>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Technicien</th>
                    <th>Durée (Main d'œuvre)</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicule->reparations as $reparation)
                <tr>
                    <td><strong>{{ $reparation->date->format('d/m/Y') }}</strong></td>
                    <td>
                        @if($reparation->technicien)
                            {{ $reparation->technicien->prenom }} {{ $reparation->technicien->nom }}
                        @else
                            <span style="color: #B0B0B0;">Non assigné</span>
                        @endif
                    </td>
                    <td>
                        @if($reparation->duree_main_oeuvre)
                            <span class="info-badge" style="font-size: 12px;">{{ $reparation->duree_main_oeuvre }} min</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ Str::limit($reparation->objet_reparation, 60) }}</td>
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
<div style="margin-top: 60px;">
    <div class="no-results">
        <strong>Aucune réparation enregistrée</strong><br>
        Ce véhicule n'a pas encore d'historique de réparations
    </div>
</div>
@endif
@endsection