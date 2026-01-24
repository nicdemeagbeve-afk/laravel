@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    {{-- Bouton Retour --}}

    <div class="mb-8">
        <a href="{{ route('vehicules.index') }}" class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-colors">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-emerald-500/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </span>
            <span class="text-sm font-black uppercase tracking-widest">Retour  au  garage</span>
        </a>
    </div>

    <div class="glass-nav rounded-[3rem] p-10 border border-white/10 shadow-2xl relative overflow-hidden">
        {{-- Glow Effect --}}

        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-emerald-600/10 rounded-full blur-[100px]"></div>

        <div class="relative z-10">
            <div class="flex items-center mb-10">
                <div class="p-4 bg-emerald-500 rounded-2xl shadow-[0_0_20px_rgba(16,185,129,0.4)] mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-black text-white italic tracking-tighter uppercase">Nouveau <span class="text-emerald-400">Véhicule</span></h1>
                    <p class="text-slate-500 font-bold text-sm tracking-wide">Enregistrement  d'une  nouvelle  unité  dans  le  système </p>
                </div>
            </div>

            <form action="{{ route('vehicules.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    {{-- Immatriculation (Pleine largeur sur mobile) --}}
                    <div class="md:col-span-2 lg:col-span-1">
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Immatriculation</label>
                        <input type="text" name="immatriculation" placeholder="AA-123-BB" required
                               class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white font-mono text-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all outline-none">
                    </div>

                    {{-- Marque --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Marque</label>
                        <input type="text" name="marque" placeholder="ex: Toyota" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none">
                    </div>

                    {{-- Modèle --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Modèle</label>
                        <input type="text" name="modele" placeholder="ex: Hilux" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none">
                    </div>

                    {{-- Couleur --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Couleur</label>
                        <input type="text" name="couleur" placeholder="ex: Gris Anthracite" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none">
                    </div>

                    {{-- Année --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Année</label>
                        <input type="number" name="annee" placeholder="2024" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none">
                    </div>

                    {{-- Kilométrage --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Kilométrage initial</label>
                        <input type="number" name="kilometrage" placeholder="0" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none">
                    </div>

                    {{-- Carrosserie --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Carrosserie</label>
                        <input type="text" name="carrosserie" placeholder="SUV, Berline..." required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none">
                    </div>

                    {{-- Énergie --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Énergie</label>
                        <select name="energie" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none appearance-none">
                            <option value="Essence" class="bg-slate-900">Essence</option>
                            <option value="Diesel" class="bg-slate-900">Diesel</option>
                            <option value="Hybride" class="bg-slate-900">Hybride</option>
                            <option value="Électrique" class="bg-slate-900">Électrique</option>
                        </select>
                    </div>

                    {{-- Boîte --}}
                    <div>
                        <label class="text-slate-400 text-xs font-black uppercase tracking-widest mb-3 block ml-1">Boîte</label>
                        <select name="boite" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none appearance-none">
                            <option value="Manuelle" class="bg-slate-900">Manuelle</option>
                            <option value="Automatique" class="bg-slate-900">Automatique</option>
                        </select>
                    </div>
                </div>

                {{-- Submit Section --}}
                <div class="pt-10 border-t border-white/5">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-black py-6 rounded-[1.5rem] shadow-[0_20px_40px_rgba(16,185,129,0.2)] transform transition-all active:scale-95 flex justify-center items-center group overflow-hidden relative">
                        {{-- Anim d'éclat au hover --}}
                        <div class="absolute inset-0 w-1/2 h-full bg-white/20 -skew-x-12 -translate-x-full group-hover:animate-[shine_1s_ease-in-out]"></div>
                        
                        <span class="mr-3 uppercase tracking-tighter text-xl italic">Initialiser  le  véhicule</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes shine {
        100% { transform: skewX(-12deg) translateX(250%); }
    }
    /* Style pour les selects pour enlever la flèche par défaut et en mettre une personnalisée si besoin */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1.5rem center;
        background-size: 1rem;
    }
</style>
@endsection