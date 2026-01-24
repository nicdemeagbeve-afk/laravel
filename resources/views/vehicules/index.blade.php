@extends('layouts.app')

@section('content')
<div class="glass-nav p-8 rounded-3xl shadow-2xl border border-white/10">
    
    {{-- En-tête avec titre et bouton --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Parc <span class="text-blue-400">Automobile</span>
            </h1>
            <div class="h-1.5 w-32 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mt-3"></div>
        </div>
        
        <a href="{{ route('vehicules.create') }}" 
           class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-8 py-4 rounded-2xl font-black shadow-[0_10px_20px_rgba(16,185,129,0.3)] hover:shadow-emerald-500/50 transition-all transform hover:-translate-y-1 active:scale-95">
           + AJOUTER  UN  VÉHICULE
        </a>
    </div>

    {{-- Barre de recherche stylisée --}}
    <div class="mb-10">
        <form action="{{ route('vehicules.index') }}" method="GET" class="relative max-w-xl group">
            <input 
                type="text" 
                name="search" 
                placeholder="Rechercher une immatriculation..." 
                value="{{ request('search') }}"
                class="w-full bg-white/5 border border-white/10 py-4 px-6 pr-12 rounded-2xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all backdrop-blur-md"
            >
            <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 group-hover:text-blue-400 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            
            @if(request('search'))
                <a href="{{ route('vehicules.index') }}" class="absolute -bottom-6 left-2 text-xs text-red-400 hover:text-red-300 underline">
                    Réinitialiser  la  recherche
                </a>
            @endif
        </form>
    </div>

    {{-- Grille de Véhicules (Style Carte Moderne) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($vehicules as $vehicule)
        <div class="group relative bg-white/5 border border-white/10 rounded-3xl p-6 transition-all duration-500 hover:bg-white/10 hover:shadow-[0_20px_50px_rgba(0,0,0,0.3)] transform hover:-translate-y-2 overflow-hidden">
            
            {{-- Effet de brillance carrosserie au survol --}}
            <div class="absolute -inset-full top-0 block w-1/2 h-full z-5 bg-gradient-to-r from-transparent via-white/10 to-transparent transform -skew-x-12 group-hover:animate-[shine_1s_ease-in-out]"></div>

            <div class="flex justify-between items-start mb-6">
                <div class="bg-blue-600/20 text-blue-400 px-4 py-1.5 rounded-xl text-xs font-black tracking-widest border border-blue-500/30">
                    {{ $vehicule->annee }}
                </div>
                <div class="text-slate-500 text-xs font-bold">#{{ $vehicule->id }}</div>
            </div>

            <div class="mb-6">
                <h3 class="text-2xl font-black text-white mb-1 uppercase tracking-tight">{{ $vehicule->marque }}</h3>
                <p class="text-blue-400 font-bold text-lg">{{ $vehicule->modele }}</p>
            </div>

            <div class="space-y-3 mb-8">
                <div class="flex items-center text-slate-300 bg-black/20 p-3 rounded-xl border border-white/5">
                    <span class="text-xs uppercase font-bold text-slate-500 w-24">Plaque:</span>
                    <span class="font-mono font-bold text-white">{{ $vehicule->immatriculation }}</span>
                </div>
                <div class="flex items-center text-slate-300">
                    <span class="text-xs uppercase font-bold text-slate-500 w-24">Couleur:</span>
                    <span class="flex items-center">
                        <span class="w-3 h-3 rounded-full mr-2 border border-white/20" style="background-color: {{ $vehicule->couleur }}"></span>
                        {{ $vehicule->couleur }}
                    </span>
                </div>
                <div class="flex items-center text-slate-300">
                    <span class="text-xs uppercase font-bold text-slate-500 w-24">KM:</span>
                    <span class="font-bold text-emerald-400">{{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km</span>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <a href="{{ route('vehicules.show', $vehicule->id) }}" class="flex-1 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl text-center text-xs font-black transition-colors border border-white/10">VOIR</a>
                <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="flex-1 py-3 bg-blue-600/20 hover:bg-blue-600/40 text-blue-400 rounded-xl text-center text-xs font-black transition-colors border border-blue-500/30">ÉDITER</a>
                
                <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Supprimer ce véhicule ?')" class="p-3 bg-red-500/10 hover:bg-red-500/30 text-red-500 rounded-xl transition-colors border border-red-500/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center glass-nav rounded-3xl border border-white/10">
            <p class="text-slate-400 font-bold text-xl italic">Aucun  véhicule trouvé dans le garage...</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $vehicules->links() }}
    </div>
</div>

<style>
    @keyframes shine {
        100% { left: 125%; }
    }
</style>
@endsection