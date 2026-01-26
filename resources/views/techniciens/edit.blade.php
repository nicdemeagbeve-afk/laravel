@extends('layouts.app')

@section('content')
<h1>Modifier un technicien</h1>

<form action="{{ route('techniciens.update', $technicien->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom :</label><br>
    <input type="text" name="nom" value="{{ $technicien->nom }}"><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="prenom" value="{{ $technicien->prenom }}"><br><br>

    <label>Spécialité :</label><br>
    <input type="text" name="specialite" value="{{ $technicien->specialite }}"><br><br>

    <button type="submit">Mettre à jour</button>
</form>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection
