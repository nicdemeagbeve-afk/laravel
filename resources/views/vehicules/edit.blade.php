@extends('layouts.app')
@section('content')

    <!-- Contenu principal -->
    <main class="container" style="padding: 3rem 20px;">
        <h1>Modifier le véhicule</h1>

        <!-- Formulaire -->
        <form method="POST" action="/vehicules/{{ $vehicule->id }}" class="form-vehicule">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label>Immatriculation :</label>
                    <input type="text" name="immatriculation" value="{{ $vehicule->immatriculation }}" required>
                </div>

                <div class="form-group">
                    <label>Marque :</label>
                    <input type="text" name="marque" value="{{ $vehicule->marque }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Modèle :</label>
                    <input type="text" name="modele" value="{{ $vehicule->modele }}" required>
                </div>

                <div class="form-group">
                    <label>Couleur :</label>
                    <input type="text" name="couleur" value="{{ $vehicule->couleur }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Année :</label>
                    <input type="number" name="annee" value="{{ $vehicule->annee }}">
                </div>

                <div class="form-group">
                    <label>Kilométrage :</label>
                    <input type="number" name="kilometrage" value="{{ $vehicule->kilometrage }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Carrosserie :</label>
                    <input type="text" name="carrosserie" value="{{ $vehicule->carrosserie }}">
                </div>

                <div class="form-group">
                    <label>Energie :</label>
                    <select name="energie">
                        <option value="">-- Choisir --</option>
                        <option value="essence" {{ $vehicule->energie == 'essence' ? 'selected' : '' }}>Essence</option>
                        <option value="diesel" {{ $vehicule->energie == 'diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="hybride" {{ $vehicule->energie == 'hybride' ? 'selected' : '' }}>Hybride</option>
                        <option value="electrique" {{ $vehicule->energie == 'electrique' ? 'selected' : '' }}>Électrique</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Boîte de vitesse :</label>
                    <select name="boite">
                        <option value="">-- Choisir --</option>
                        <option value="manuelle" {{ $vehicule->boite == 'manuelle' ? 'selected' : '' }}>Manuelle</option>
                        <option value="automatique" {{ $vehicule->boite == 'automatique' ? 'selected' : '' }}>Automatique</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="/vehicules" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </main>

    @endsection