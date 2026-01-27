@extends('layouts.app')

@section('content')


    <!-- Contenu principal -->
    <main class="container" style="padding: 3rem 20px;">
        <h1>Liste des véhicules</h1>

        <!-- Message flash -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Bouton Ajouter -->
        <div style="margin-bottom: 2rem;">
            <a href="/vehicules/create" class="btn btn-primary">➕ Ajouter un véhicule</a>
        </div>


        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Immatriculation</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Couleur</th>
                <th>Kilométrage</th>
                <th>Carrosserie</th>
                <th>Energie</th>
                <th>Boîte</th>
                <th>Action</th>
            </tr>

            @foreach ($vehicules as $vehicule)
            <tr>
                <td>{{ $vehicule->id }}</td>
                <td>{{ $vehicule->immatriculation }}</td>
                <td>{{ $vehicule->marque }}</td>
                <td>{{ $vehicule->modele }}</td>
                <td>{{ $vehicule->couleur }}</td>
                <td>{{ $vehicule->kilometrage }}</td>
                <td>{{ $vehicule->carrosserie }}</td>
                <td>{{ $vehicule->energie }}</td>
                <td>{{ $vehicule->boite }}</td>
                <td>
                    <a href="/vehicules/{{ $vehicule->id }}/edit">Modifier</a>

                    <form action="/vehicules/{{ $vehicule->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer ce véhicule ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </main>

   @endsection