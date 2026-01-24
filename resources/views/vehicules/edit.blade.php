@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6 md:py-12">
    {{-- Fil d'Ariane / Retour --}}
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('vehicules.index') }}" class="group flex items-center text-slate-400 hover:text-white transition-all">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-blue-600/20 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </span>
            <span class="text-[10px] font-black tracking-[0.2em] uppercase">Annuler & Retour</span>
        </a>
        <span class="hidden sm:block text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">Édition de véhicule</span>
    </div>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl animate-pulse">
            <ul class="text-red-400 text-xs font-bold italic">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-nav rounded-[2.5rem] p-6 md:p-12 border border-white/10 shadow-2xl relative overflow-hidden">
        {{-- Décoration d'arrière-plan --}}
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-600/10 rounded-full blur-[80px]"></div>

        <div class="relative z-10">
            <div class="mb-10 text-center md:text-left">
                <h1 class="text-2xl md:text-3xl font-black text-white italic tracking-tighter uppercase leading-none">
                    Modifier le <span class="text-blue-400">Châssis</span>
                </h1>
                <p class="text-slate-400 text-xs md:text-sm mt-2 font-medium">Mise à jour des données techniques du véhicule.</p>
            </div>

            <form action="{{ route('vehicules.update', $vehicule->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8">

                    {{-- Immatriculation (Pleine largeur) --}}
                    <div class="md:col-span-2 group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Plaque d'immatriculation</label>
                        <input type="text" name="immatriculation" value="{{ old('immatriculation', $vehicule->immatriculation) }}" 
                               class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white font-mono text-xl focus:border-blue-500 transition-all outline-none uppercase" required>
                    </div>

                    {{-- Marque --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Marque</label>
                        <input type="text" name="marque" value="{{ old('marque', $vehicule->marque) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required>
                    </div>

                    {{-- Modèle --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Modèle</label>
                        <input type="text" name="modele" value="{{ old('modele', $vehicule->modele) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required>
                    </div>

                    {{-- Couleur --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Couleur</label>
                        <input type="text" name="couleur" value="{{ old('couleur', $vehicule->couleur) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required>
                    </div>

                    {{-- Année --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Année</label>
                        <input type="number" name="annee" value="{{ old('annee', $vehicule->annee) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required>
                    </div>

                    {{-- Kilométrage --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Kilométrage (KM)</label>
                        <input type="number" name="kilometrage" value="{{ old('kilometrage', $vehicule->kilometrage) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required>
                    </div>

                    {{-- Énergie --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Énergie</label>
                        <input type="text" name="energie" value="{{ old('energie', $vehicule->energie) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required>
                    </div>

                    {{-- Carrosserie (Nouveau champ indispensable) --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Carrosserie</label>
                        <input type="text" name="carrosserie" value="{{ old('carrosserie', $vehicule->carrosserie) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required placeholder="Berline, SUV...">
                    </div>

                    {{-- Boîte de vitesse (Nouveau champ indispensable) --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-blue-400 transition-colors">Boîte de vitesse</label>
                        <input type="text" name="boite" value="{{ old('boite', $vehicule->boite) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-blue-500 transition-all outline-none" required placeholder="Manuelle, Auto...">
                    </div>
                </div>

                {{-- Bouton Submit --}}
                <div class="pt-10">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-black py-5 rounded-2xl shadow-xl shadow-blue-600/20 transform transition-all active:scale-95 flex justify-center items-center group">
                        <span class="mr-4 uppercase tracking-widest [word-spacing:0.4rem] md:[word-spacing:1rem] text-sm md:text-lg italic">Sauvegarder les modifications</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection