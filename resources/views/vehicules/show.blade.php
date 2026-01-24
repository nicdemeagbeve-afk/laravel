@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- Bouton Retour Rapide --}}
    <a href="{{ route('vehicules.index') }}" class="inline-flex items-center text-slate-400 hover:text-blue-400 mb-6 transition-colors group">
        <span class="mr-2 transform group-hover:-translate-x-2 transition-transform">←</span>
        Retour  au  parc  automobile
    </a>

    <div class="glass-nav rounded-3xl overflow-hidden shadow-2xl border border-white/10 relative">
        {{-- Header de la Fiche --}}
        <div class="bg-gradient-to-r from-blue-600/20 to-indigo-600/20 p-8 border-bottom border-white/10 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black text-white tracking-tighter uppercase italic">
                    {{ $vehicule->marque }} <span class="text-blue-400">{{ $vehicule->modele }}</span>
                </h1>
                <p class="text-slate-400 font-medium mt-1 uppercase tracking-widest text-xs">Fiche Technique ID #{{ $vehicule->id }}</p>
            </div>
            <div class="text-right">
                <span class="block text-2xl font-mono font-black text-white bg-black/40 px-4 py-2 rounded-xl border border-white/10 shadow-inner">
                    {{ $vehicule->immatriculation }}
                </span>
            </div>
        </div>

        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Colonne Gauche : Specs --}}
            <div class="space-y-4">
                <h3 class="text-blue-400 font-bold text-sm uppercase tracking-widest mb-4 flex items-center">
                    <span class="w-8 h-[2px] bg-blue-400 mr-3"></span> Configuration
                </h3>
                
                <div class="flex justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-colors">
                    <span class="text-slate-500 font-bold text-xs uppercase">Année de Sortie</span>
                    <span class="text-white font-black">{{ $vehicule->annee }}</span>
                </div>

                <div class="flex justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-colors">
                    <span class="text-slate-500 font-bold text-xs uppercase">Énergie</span>
                    <span class="text-emerald-400 font-black uppercase tracking-wider text-sm">{{ $vehicule->energie }}</span>
                </div>

                <div class="flex justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-colors">
                    <span class="text-slate-500 font-bold text-xs uppercase">Transmission</span>
                    <span class="text-white font-black uppercase text-sm">{{ $vehicule->boite }}</span>
                </div>
            </div>

            {{-- Colonne Droite : État --}}
            <div class="space-y-4">
                <h3 class="text-blue-400 font-bold text-sm uppercase tracking-widest mb-4 flex items-center">
                    <span class="w-8 h-[2px] bg-blue-400 mr-3"></span> État du Véhicule
                </h3>

                <div class="flex justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-colors">
                    <span class="text-slate-500 font-bold text-xs uppercase">Kilométrage</span>
                    <span class="text-white font-black">{{ number_format($vehicule->kilometrage, 0, ',', ' ') }} <span class="text-blue-400 text-xs">KM</span></span>
                </div>

                <div class="flex justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-colors">
                    <span class="text-slate-500 font-bold text-xs uppercase">Carrosserie</span>
                    <span class="text-white font-black italic">{{ $vehicule->carrosserie }}</span>
                </div>

                <div class="flex justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-colors">
                    <span class="text-slate-500 font-bold text-xs uppercase">Teinte</span>
                    <div class="flex items-center">
                        <span class="w-4 h-4 rounded-full mr-2 shadow-sm border border-white/20" style="background-color: {{ $vehicule->couleur }}"></span>
                        <span class="text-white font-black text-sm uppercase">{{ $vehicule->couleur }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Barre d'actions --}}
        <div class="p-8 bg-white/5 border-t border-white/10 flex gap-4">
            
           <a href="{{ route('vehicules.edit', $vehicule->id) }}" 
   class="flex-1 bg-gradient-to-r from-orange-500 to-amber-600 text-white text-center py-4 rounded-2xl font-black uppercase tracking-widest [word-spacing:1.5rem] shadow-lg shadow-orange-500/20 hover:scale-[1.02] transition-transform">
    Modifier les informations
</a>
            
            <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" class="flex-none">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Action irréversible. Confirmer ?')" 
                        class="px-6 py-4 bg-red-500/10 border border-red-500/30 text-red-500 rounded-2xl font-black hover:bg-red-500/20 transition-all">
                    SUPPRIMER
                </button>
            </form>
        </div>
    </div>

    {{-- Section Historique (Bonus design) --}}
    <div class="mt-8 p-6 bg-blue-600/10 rounded-3xl border border-blue-500/20">
        <p class="text-blue-300 text-sm font-medium flex items-center">
            <span class="mr-3">ℹ️</span>
            {{-- Version sécurisée : affiche la date si elle existe, sinon un texte de remplacement --}}
Ce véhicule a été enregistré le {{ $vehicule->created_at ? $vehicule->created_at->format('d/m/Y') : 'date inconnue' }}.
            Toute modification impactera les rapports de maintenance liés.
        </p>
    </div>
</div>
@endsection