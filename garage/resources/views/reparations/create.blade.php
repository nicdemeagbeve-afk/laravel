@extends('layouts.app')

@section('title', 'Ajouter une Réparation')

@section('content')
<div style="max-width: 900px; margin: 0 auto;">
    <div class="page-title">
        <h2> Nouvelle Réparation</h2>
    </div>

    <form action="{{ route('reparations.store') }}" method="POST" class="card">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="vehicule_id">Véhicule *</label>
                <select id="vehicule_id" name="vehicule_id" required>
                    <option value="">-- Sélectionner un véhicule --</option>
                    @foreach($vehicules as $vehicule)
                        <option value="{{ $vehicule->id }}" {{ old('vehicule_id') == $vehicule->id ? 'selected' : '' }}>
                            {{ $vehicule->immatriculation }} - {{ $vehicule->marque }} {{ $vehicule->modele }}
                        </option>
                    @endforeach
                </select>
                @if($vehicules->count() == 0)
                    <small style="color: #dc3545; display: block; margin-top: 8px;">
                         Aucun véhicule disponible. <a href="{{ route('vehicules.create') }}"
                            style="color: #C9A227; font-weight: 600;">Ajouter un véhicule</a>
                    </small>
                @endif
            </div>
            <div class="form-group">
                <label for="technicien_id">Technicien</label>
                <select id="technicien_id" name="technicien_id">
                    <option value="">-- Sélectionner un technicien --</option>
                    @foreach($techniciens as $technicien)
                        <option value="{{ $technicien->id }}" {{ old('technicien_id') == $technicien->id ? 'selected' : '' }}>
                            {{ $technicien->prenom }} {{ strtoupper($technicien->nom) }}
                            @if($technicien->specialite) - {{ $technicien->specialite }} @endif
                        </option>
                    @endforeach
                </select>
                @if($techniciens->count() == 0)
                    <small style="color: #C9A227; display: block; margin-top: 8px;">
                         Aucun technicien disponible. <a href="{{ route('techniciens.create') }}"
                            style="color: #C9A227; font-weight: 600;">Ajouter un technicien</a>
                    </small>
                @endif
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
            <div class="form-group">
                <label for="date">Date de la réparation *</label>
                <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="duree_main_oeuvre">Durée de la main d'œuvre (en minutes)</label>
                <input type="number" id="duree_main_oeuvre" name="duree_main_oeuvre"
                    value="{{ old('duree_main_oeuvre') }}" min="0" placeholder="Ex: 120">
                <small style="color: #B0B0B0; display: block; margin-top: 8px;">Temps passé sur la réparation</small>
            </div>
        </div>

        <div class="form-group">
            <label for="objet_reparation">Description de la réparation *</label>
            <textarea id="objet_reparation" name="objet_reparation" required
                placeholder="Décrivez en détail les travaux effectués...">{{ old('objet_reparation') }}</textarea>
            <small style="color: #B0B0B0; display: block; margin-top: 8px;">Soyez le plus précis possible sur les
                interventions réalisées</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"> Enregistrer</button>
            <a href="{{ route('reparations.index') }}" class="btn btn-secondary"> Annuler</a>
        </div>
    </form>