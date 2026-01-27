@extends('layouts.app')

@section('content')
    


    <!-- Contenu principal -->
    <main class="container main-content">
        <h1>Ajouter un véhicule</h1>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ url('/vehicules') }}" method="POST" class="form-vehicule">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label>Immatriculation :</label>
                    <input type="text" name="immatriculation" required placeholder="Ex: AB-123-CD">
                </div>

                <div class="form-group">
                    <label>Marque :</label>
                    <input type="text" name="marque" required placeholder="Ex: Peugeot">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Modèle :</label>
                    <input type="text" name="modele" required placeholder="Ex: 308">
                </div>

                <div class="form-group">
                    <label>Couleur :</label>
                    <input type="text" name="couleur" placeholder="Ex: Noir">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Année :</label>
                    <input type="text" name="annee" placeholder="Ex: 2020">
                </div>

                <div class="form-group">
                    <label>Kilométrage :</label>
                    <input type="text" name="kilometrage" placeholder="Ex: 50000">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Carrosserie :</label>
                    <input type="text" name="carrosserie" placeholder="Ex: Berline">
                </div>

                <div class="form-group">
                    <label>Energie :</label>
                    <select name="energie">
                        <option value="">-- Choisir --</option>
                        <option value="essence">Essence</option>
                        <option value="diesel">Diesel</option>
                        <option value="hybride">Hybride</option>
                        <option value="electrique">Electrique</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Boîte de vitesse :</label>
                    <select name="boite">
                        <option value="">-- Choisir --</option>
                        <option value="manuelle">Manuelle</option>
                        <option value="automatique">Automatique</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="/vehicules" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </main>

    @endsection