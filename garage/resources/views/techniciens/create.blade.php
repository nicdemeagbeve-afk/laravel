@extends('layouts.app')

@section('title', 'Ajouter un Technicien')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div class="page-title">
        <h2> Nouveau Technicien</h2>
    </div>

    <form action="{{ route('techniciens.store') }}" method="POST" class="card">
        @csrf

        <div class="form-group">
            <label for="nom">Nom *</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required placeholder="Ex: DUPONT">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom *</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required placeholder="Ex: Jean">
        </div>

        <div class="form-group">
            <label for="specialite">Spécialité</label>
            <select id="specialite" name="specialite">
                <option value="">-- Sélectionner une spécialité --</option>
                <option value="Mécanique générale" {{ old('specialite') == 'Mécanique générale' ? 'selected' : '' }}>Mécanique générale</option>
                <option value="Électricité automobile" {{ old('specialite') == 'Électricité automobile' ? 'selected' : '' }}>Électricité automobile</option>
                <option value="Carrosserie" {{ old('specialite') == 'Carrosserie' ? 'selected' : '' }}>Carrosserie</option>
                <option value="Peinture" {{ old('specialite') == 'Peinture' ? 'selected' : '' }}>Peinture</option>
                <option value="Diagnostic électronique" {{ old('specialite') == 'Diagnostic électronique' ? 'selected' : '' }}>Diagnostic électronique</option>
                <option value="Pneumatiques" {{ old('specialite') == 'Pneumatiques' ? 'selected' : '' }}>Pneumatiques</option>
                <option value="Climatisation" {{ old('specialite') == 'Climatisation' ? 'selected' : '' }}>Climatisation</option>
                <option value="Transmission" {{ old('specialite') == 'Transmission' ? 'selected' : '' }}>Transmission</option>
                <option value="Freinage" {{ old('specialite') == 'Freinage' ? 'selected' : '' }}>Freinage</option>
                <option value="Moteur diesel" {{ old('specialite') == 'Moteur diesel' ? 'selected' : '' }}>Moteur diesel</option>
                <option value="Moteur essence" {{ old('specialite') == 'Moteur essence' ? 'selected' : '' }}>Moteur essence</option>
                <option value="Véhicules hybrides/électriques" {{ old('specialite') == 'Véhicules hybrides/électriques' ? 'selected' : '' }}>Véhicules hybrides/électriques</option>
            </select>
            <small style="color: #B0B0B0; display: block; margin-top: 8px;"></small>
        </div>

        <div class="form-group">
            <label for="specialite_custom">Ou saisir une spécialité </label>
            <input type="text" id="specialite_custom" placeholder="Ex: Expert en véhicules anciens">
            <small style="color: #B0B0B0; display: block; margin-top: 8px;"></small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Enregistrer</button>
            <a href="{{ route('techniciens.index') }}" class="btn btn-secondary"> Annuler</a>
        </div>
    </form>
</div>

<script>
    // Gérer la spécialité personnalisée
    document.getElementById('specialite_custom').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            document.getElementById('specialite').value = '';
        }
    });

    document.getElementById('specialite').addEventListener('change', function() {
        if (this.value !== '') {
            document.getElementById('specialite_custom').value = '';
        }
    });

    // Soumettre la valeur personnalisée si elle existe
    document.querySelector('form').addEventListener('submit', function(e) {
        const customSpecialite = document.getElementById('specialite_custom').value.trim();
        if (customSpecialite !== '') {
            document.getElementById('specialite').value = customSpecialite;
        }
    });
</script>
@endsection