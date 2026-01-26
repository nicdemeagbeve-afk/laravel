@extends('layouts.app')

@section('content')
<h1>Modifier la réparation</h1>

<form action="{{ route('reparations.update', $reparation->id) }}"
      method="POST"
      class="form-vehicule">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group">
            <label>Véhicule</label>
            <select name="vehicule_id" required>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}"
                        {{ $vehicule->id == $reparation->vehicule_id ? 'selected' : '' }}>
                        {{ $vehicule->immatriculation }} ({{ $vehicule->marque }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Technicien</label>
            <select name="technicien_id">
                <option value="">— Aucun —</option>
                @foreach($techniciens as $technicien)
                    <option value="{{ $technicien->id }}"
                        {{ $technicien->id == $reparation->technicien_id ? 'selected' : '' }}>
                        {{ $technicien->nom }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label>Date</label>
            <input type="date"
                   name="date"
                   value="{{ $reparation->date }}"
                   required>
        </div>

        <div class="form-group">
            <label>Durée (min)</label>
            <input type="number"
                   name="duree_main_oeuvre"
                   value="{{ $reparation->duree_main_oeuvre }}">
        </div>
    </div>

    <div class="form-group">
        <label>Objet de la réparation</label>
        <input type="text"
               name="objet_reparation"
               value="{{ $reparation->objet_reparation }}"
               required>
    </div>

    <div class="form-actions">
        <button class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('reparations.index') }}"
           class="btn btn-secondary">Annuler</a>
    </div>
</form>
@endsection
