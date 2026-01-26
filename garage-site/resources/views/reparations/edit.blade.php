@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2 mb-2">
            🔧 Modifier la réparation
        </h1>
        <p class="text-gray-600">Mettez à jour les informations de cette réparation</p>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <p class="font-medium text-red-800 mb-3">Erreurs détectées:</p>
        <ul class="space-y-2">
            @foreach($errors->all() as $error)
                <li class="flex items-start gap-2 text-red-700">
                    <span class="text-lg mt-0.5">!</span>
                    <span>{{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 md:p-8">
        <form action="{{ route('reparations.update', $reparation) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Row 1: Véhicule & Technicien -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="vehicule_id" class="block text-sm font-semibold text-gray-900 mb-2">
                            Véhicule
                        </label>
                        <select 
                            id="vehicule_id"
                            name="vehicule_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                            @foreach($vehicules as $v)
                                <option value="{{ $v->id }}" {{ $v->id == old('vehicule_id', $reparation->vehicule_id) ? 'selected' : '' }}>
                                    {{ $v->immatriculation }} - {{ $v->marque }} {{ $v->modele }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehicule_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="technicien_id" class="block text-sm font-semibold text-gray-900 mb-2">
                            Technicien
                        </label>
                        <select 
                            id="technicien_id"
                            name="technicien_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                            @foreach($techniciens as $t)
                                <option value="{{ $t->id }}" {{ $t->id == old('technicien_id', $reparation->technicien_id) ? 'selected' : '' }}>
                                    {{ $t->nom }} {{ $t->prenom }} - {{ $t->specialite }}
                                </option>
                            @endforeach
                        </select>
                        @error('technicien_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                        Description
                    </label>
                    <textarea 
                        id="description"
                        name="description" 
                        rows="4"
                        placeholder="Décrivez les travaux de réparation..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        required
                    >{{ old('description', $reparation->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Row 2: Prix & Dates -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="prix" class="block text-sm font-semibold text-gray-900 mb-2">
                            Prix (F CFA)
                        </label>
                        <input 
                            type="number" 
                            id="prix"
                            step="0.01" 
                            name="prix" 
                            value="{{ old('prix', $reparation->prix) }}"
                            placeholder="0.00"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                    </div>

                    <div>
                        <label for="date_debut" class="block text-sm font-semibold text-gray-900 mb-2">
                            Date de début
                        </label>
                        <input 
                            type="date" 
                            id="date_debut"
                            name="date_debut" 
                            value="{{ old('date_debut', $reparation->date_debut) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                    </div>

                    <div>
                        <label for="date_fin" class="block text-sm font-semibold text-gray-900 mb-2">
                            Date de fin
                        </label>
                        <input 
                            type="date" 
                            id="date_fin"
                            name="date_fin" 
                            value="{{ old('date_fin', $reparation->date_fin) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        >
                    </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-semibold shadow-sm"
                    >
                        ✓ Mettre à jour
                    </button>
                    <a 
                        href="{{ route('reparations.index') }}" 
                        class="flex-1 px-6 py-3 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition duration-200 font-semibold text-center"
                    >
                        ✕ Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
