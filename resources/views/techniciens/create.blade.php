@extends('layouts.app')

@section('content')

<div class="main-content create-page">
<h1>Ajouter un technicien</h1>

<form action="{{ route('techniciens.store') }}" method="POST">
    @csrf

    <label>Nom :</label><br>
    <input type="text" name="nom"><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Spécialité :</label><br>
    <input type="text" name="specialite"><br><br>

    <button type="submit">Enregistrer</button>
</form>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

@endsection
