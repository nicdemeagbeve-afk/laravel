@extends('layouts.app')

@section('title', 'Modifier le Véhicule')

@section('content')
<div style="max-width: 900px; margin: 0 auto;">
    <div class="page-title">
        <h2> Modifier le Véhicule</h2>
    </div>

    <form action="{{ route('vehicules.update', $vehicule) }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="immatriculation">Immatriculation *</label>
                <input type="text" id="immatriculation" name="immatriculation"
                    value="{{ old('immatriculation', $vehicule->immatriculation) }}" required>
            </div>

            <div class="form-group">
                <label for="marque">Marque *</label>
                <input type="text" id="marque" name="marque" value="{{ old('marque', $vehicule->marque) }}" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="modele">Modèle *</label>
                <input type="text" id="modele" name="modele" value="{{ old('modele', $vehicule->modele) }}" required>
            </div>

            <div class="form-group">
                <label for="couleur">Couleur</label>
                <input type="text" id="couleur" name="couleur" value="{{ old('couleur', $vehicule->couleur) }}">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" id="annee" name="annee" value="{{ old('annee', $vehicule->annee) }}" min="1900"
                    max="{{ date('Y') + 1 }}">
            </div>

            <div class="form-group">
                <label for="kilometrage">Kilométrage (km)</label>
                <input type="number" id="kilometrage" name="kilometrage"
                    value="{{ old('kilometrage', $vehicule->kilometrage) }}" min="0">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="carrosserie">Carrosserie</label>
                <select id="carrosserie" name="carrosserie">
                    <option value="">-- Sélectionner --</option>
                    <option value="Berline" {{ old('carrosserie', $vehicule->carrosserie) == 'Berline' ? 'selected' : '' }}>Berline</option>
                    <option value="SUV" {{ old('carrosserie', $vehicule->carrosserie) == 'SUV' ? 'selected' : '' }}>SUV
                    </option>
                    <option value="Coupé" {{ old('carrosserie', $vehicule->carrosserie) == 'Coupé' ? 'selected' : '' }}>
                        Coupé</option>
                    <option value="Break" {{ old('carrosserie', $vehicule->carrosserie) == 'Break' ? 'selected' : '' }}>
                        Break</option>
                    <option value="Monospace" {{ old('carrosserie', $vehicule->carrosserie) == 'Monospace' ? 'selected' : '' }}>Monospace</option>
                    <option value="Pickup" {{ old('carrosserie', $vehicule->carrosserie) == 'Pickup' ? 'selected' : '' }}>
                        Pickup</option>
                    <option value="Utilitaire" {{ old('carrosserie', $vehicule->carrosserie) == 'Utilitaire' ? 'selected' : '' }}>Utilitaire</option>
                </select>
            </div>

            <div class="form-group">
                <label for="energie">Énergie</label>
                <select id="energie" name="energie">
                    <option value="">-- Sélectionner --</option>
                    <option value="Essence" {{ old('energie', $vehicule->energie) == 'Essence' ? 'selected' : '' }}>
                        Essence</option>
                    <option value="Diesel" {{ old('energie', $vehicule->energie) == 'Diesel' ? 'selected' : '' }}>Diesel
                    </option>
                    <option value="Hybride" {{ old('energie', $vehicule->energie) == 'Hybride' ? 'selected' : '' }}>
                        Hybride</option>
                    <option value="Électrique" {{ old('energie', $vehicule->energie) == 'Électrique' ? 'selected' : '' }}>
                        Électrique</option>
                    <option value="GPL" {{ old('energie', $vehicule->energie) == 'GPL' ? 'selected' : '' }}>GPL</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="boite">Boîte de vitesses</label>
            <select id="boite" name="boite">
                <option value="">-- Sélectionner --</option>
                <option value="Manuelle" {{ old('boite', $vehicule->boite) == 'Manuelle' ? 'selected' : '' }}>Manuelle
                </option>
                <option value="Automatique" {{ old('boite', $vehicule->boite) == 'Automatique' ? 'selected' : '' }}>
                    Automatique</option>
            </select>
        </div>

        @if($vehicule->image)
            <div class="form-group">
                <label> Image actuelle</label>
                <div style="margin-top: 15px; padding: 20px; background: #f5f5f5; border-left: 4px solid #3A3A3A;">
                    <img src="{{ asset('storage/' . $vehicule->image) }}" alt="{{ $vehicule->marque }}"
                        style="max-width: 300px; border: 3px solid #3A3A3A;">
                </div>
            </div>
        @endif
        <div class="form-group">
            <label for="image">{{ $vehicule->image ? ' Changer l\'image' : ' Ajouter une image' }}</label>
            <input type="file" id="image" name="image" accept="image/*" style="padding: 10px; background: #f5f5f5;">
            <small style="color: #B0B0B0; display: block; margin-top: 8px;">Formats acceptés: JPG, PNG, GIF - Taille
                max: 2MB</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Mettre à jour</button>
            <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">↩ Annuler</a>
        </div>
    </form>