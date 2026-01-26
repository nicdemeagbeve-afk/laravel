@extends('layouts.app')

@section('title', 'Modifier le Technicien')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div class="page-title">
        <h2> Modifier le Technicien</h2>
    </div>

    <form action="{{ route('techniciens.update', $technicien) }}" method="POST" class="card">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom *</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $technicien->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom *</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $technicien->prenom) }}" required>
        </div>

        <div class="form-group">
            <label for="specialite">Spécialité</label>
            <select id="specialite" name="specialite">
                <option value="">-- Sélectionner une spécialité --</option>
                <option value="Mécanique générale" {{ old('specialite', $technicien->specialite) == 'Mécanique générale' ? 'selected' : '' }}>Mécanique générale</option>
                <option value="Électricité automobile" {{ old('specialite', $technicien->specialite) == 'Électricité automobile' ? 'selected' : '' }}>Électricité automobile</option>
                <option value="Carrosserie" {{ old('specialite', $technicien->specialite) == 'Carrosserie' ? 'selected' : '' }}>Carrosserie</option>
                <option value="Peinture" {{ old('specialite', $technicien->specialite) == 'Peinture' ? 'selected' : '' }}>Peinture</option>
                <option value="Diagnostic électronique" {{ old('specialite', $technicien->specialite) == 'Diagnostic électronique' ? 'selected' : '' }}>Diagnostic électronique</option>
                <option value="Pneumatiques" {{ old('specialite', $technicien->specialite) == 'Pneumatiques' ? 'selected' : '' }}>Pneumatiques</option>
                <option value="Climatisation" {{ old('specialite', $technicien->specialite) == 'Climatisation' ? 'selected' : '' }}>Climatisation</option>
                <option value="Transmission" {{ old('specialite', $technicien->specialite) == 'Transmission' ? 'selected' : '' }}>Transmission</option>
                <option value="Freinage" {{ old('specialite', $technicien->specialite) == 'Freinage' ? 'selected' : '' }}>Freinage</option>
                <option value="Moteur diesel" {{ old('specialite', $technicien->specialite) == 'Moteur diesel' ? 'selected' : '' }}>Moteur diesel</option>
                <option value="Moteur essence" {{ old('specialite', $technicien->specialite) == 'Moteur essence' ? 'selected' : '' }}>Moteur essence</option>
                <option value="Véhicules hybrides/électriques" {{ old('specialite', $technicien->specialite) == 'Véhicules hybrides/électriques' ? 'selected' : '' }}>Véhicules hybrides/électriques</option>
            </select>
            <small style="color: #B0B0B0; display: block; margin-top: 8px;">Vous pouvez aussi saisir une spécialité personnalisée ci-dessous</small>
        </div>

        <div class="form-group">
            <label for="specialite_custom">Ou saisir une spécialité personnalisée</label>
            <input type="text" id="specialite_custom" placeholder="Ex: Expert en véhicules anciens">
            <small style="color: #B0B0B0; display: block; margin-top: 8px;">Ce champ remplacera la sélection ci-dessus si rempli</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Mettre à jour</button>
            <a href="{{ route('techniciens.index') }}" class="btn btn-secondary">↩ Annuler</a>
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