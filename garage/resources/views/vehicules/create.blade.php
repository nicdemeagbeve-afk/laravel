@extends('layouts.app')

@section('title', 'Ajouter un Véhicule')

@section('content')
<div style="max-width: 900px; margin: 0 auto;">
    <div class="page-title">
        <h2> Nouveau Véhicule</h2>
    </div>

    <form action="{{ route('vehicules.store') }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="immatriculation">Immatriculation *</label>
                <input type="text" id="immatriculation" name="immatriculation" value="{{ old('immatriculation') }}" required placeholder="Ex: AB-123-CD">
            </div>

            <div class="form-group">
                <label for="marque">Marque *</label>
                <input type="text" id="marque" name="marque" value="{{ old('marque') }}" required placeholder="Ex: Peugeot, Renault...">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="modele">Modèle *</label>
                <input type="text" id="modele" name="modele" value="{{ old('modele') }}" required placeholder="Ex: 308, Clio...">
            </div>

            <div class="form-group">
                <label for="couleur">Couleur</label>
                <input type="text" id="couleur" name="couleur" value="{{ old('couleur') }}" placeholder="Ex: Noir, Blanc, Gris...">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" id="annee" name="annee" value="{{ old('annee') }}" min="1900" max="{{ date('Y') + 1 }}" placeholder="{{ date('Y') }}">
            </div>

            <div class="form-group">
                <label for="kilometrage">Kilométrage (km)</label>
                <input type="number" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}" min="0" placeholder="Ex: 50000">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="carrosserie">Carrosserie</label>
                <select id="carrosserie" name="carrosserie">
                    <option value="">-- Sélectionner --</option>
                    <option value="Berline" {{ old('carrosserie') == 'Berline' ? 'selected' : '' }}>Berline</option>
                    <option value="SUV" {{ old('carrosserie') == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="Coupé" {{ old('carrosserie') == 'Coupé' ? 'selected' : '' }}>Coupé</option>
                    <option value="Break" {{ old('carrosserie') == 'Break' ? 'selected' : '' }}>Break</option>
                    <option value="Monospace" {{ old('carrosserie') == 'Monospace' ? 'selected' : '' }}>Monospace</option>
                    <option value="Pickup" {{ old('carrosserie') == 'Pickup' ? 'selected' : '' }}>Pickup</option>
                    <option value="Utilitaire" {{ old('carrosserie') == 'Utilitaire' ? 'selected' : '' }}>Utilitaire</option>
                </select>
            </div>

            <div class="form-group">
                <label for="energie">Énergie</label>
                <select id="energie" name="energie">
                    <option value="">-- Sélectionner --</option>
                    <option value="Essence" {{ old('energie') == 'Essence' ? 'selected' : '' }}>Essence</option>
                    <option value="Diesel" {{ old('energie') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="Hybride" {{ old('energie') == 'Hybride' ? 'selected' : '' }}>Hybride</option>
                    <option value="Électrique" {{ old('energie') == 'Électrique' ? 'selected' : '' }}>Électrique</option>
                    <option value="GPL" {{ old('energie') == 'GPL' ? 'selected' : '' }}>GPL</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="boite">Boîte de vitesses</label>
            <select id="boite" name="boite">
                <option value="">-- Sélectionner --</option>
                <option value="Manuelle" {{ old('boite') == 'Manuelle' ? 'selected' : '' }}>Manuelle</option>
                <option value="Automatique" {{ old('boite') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image"> Image du véhicule</label>
            <input type="file" id="image" name="image" accept="image/*" style="padding: 10px; background: #f5f5f5;">
            <small style="color: #B0B0B0; display: block; margin-top: 8px;">Formats acceptés: JPG, PNG, GIF - Taille max: 2MB</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Enregistrer</button>
            <a href="{{ route('vehicules.index') }}" class="btn btn-secondary"> Annuler</a>
        </div>
    </form>
</div>
@endsection