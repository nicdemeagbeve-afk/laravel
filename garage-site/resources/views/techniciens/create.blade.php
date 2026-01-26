@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2 mb-2">
            👨‍🔧 Ajouter un technicien
        </h1>
        <p class="text-gray-600">Remplissez le formulaire ci-dessous pour ajouter un nouveau technicien</p>
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
        <form action="{{ route('techniciens.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6">
                <!-- Row 1: Nom & Prénom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nom" class="block text-sm font-semibold text-gray-900 mb-2">
                            Nom
                        </label>
                        <input 
                            type="text" 
                            id="nom"
                            name="nom" 
                            value="{{ old('nom') }}"
                            placeholder="Martin"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('nom')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-semibold text-gray-900 mb-2">
                            Prénom
                        </label>
                        <input 
                            type="text" 
                            id="prenom"
                            name="prenom" 
                            value="{{ old('prenom') }}"
                            placeholder="Paul"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('prenom')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Spécialité -->
                <div>
                    <label for="specialite" class="block text-sm font-semibold text-gray-900 mb-2">
                        Spécialité
                    </label>
                    <input 
                        type="text" 
                        id="specialite"
                        name="specialite" 
                        value="{{ old('specialite') }}"
                        placeholder="Ex: Moteur, Freinage, Électricité"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    >
                </div>

                <!-- Photo -->
                <div>
                    <label for="photo" class="block text-sm font-semibold text-gray-900 mb-2">
                        Photo de profil
                    </label>
                    <div id="photoPreview" class="mb-3"></div>
                    <div class="flex items-center justify-center w-full">
                        <label for="photo" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-200">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <p class="text-2xl mb-2">📸</p>
                                <p class="text-sm text-gray-700"><span class="font-semibold">Cliquer pour importer</span> ou glisser-déposer</p>
                                <p class="text-xs text-gray-500 mt-1">JPG ou PNG (max 2MB)</p>
                            </div>
                            <input id="photo" type="file" name="photo" accept="image/*" class="hidden">
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-semibold shadow-sm"
                    >
                        ✓ Enregistrer
                    </button>
                    <a 
                        href="{{ route('techniciens.index') }}" 
                        class="flex-1 px-6 py-3 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition duration-200 font-semibold text-center"
                    >
                        ✕ Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photoPreview');

    photoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                photoPreview.innerHTML = `<img src="${event.target.result}" alt="Preview" class="w-24 h-24 rounded-full object-cover">`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
