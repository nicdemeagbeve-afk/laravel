@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    
    {{-- Fil d'Ariane avec effet Glass --}}
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('techniciens.index') }}" class="group flex items-center text-slate-400 hover:text-orange-400 transition-all">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-orange-500/20 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </span>
            <span class="text-[10px] font-black uppercase tracking-[0.2em]">Annuler la modification</span>
        </a>
        <div class="hidden md:block">
            <span class="px-4 py-1 bg-orange-500/10 border border-orange-500/20 rounded-full text-[10px] text-orange-400 font-black uppercase tracking-widest">
                ID Système: #{{ str_pad($technicien->id, 4, '0', STR_PAD_LEFT) }}
            </span>
        </div>
    </div>

    {{-- Alertes de validation --}}
    @if ($errors->any())
        <div class="mb-8 p-6 bg-red-500/10 border border-red-500/30 rounded-[2rem] flex items-start gap-5 animate-pulse">
            <div class="bg-red-500 p-2 rounded-lg text-white font-bold">!</div>
            <div>
                <h4 class="text-red-500 font-black text-xs uppercase tracking-widest mb-1">Entrées invalides</h4>
                <ul class="text-red-400/80 text-sm italic">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="glass-nav rounded-[3rem] p-8 md:p-12 border border-white/10 shadow-2xl relative overflow-hidden">
        {{-- Effet de lumière orange en fond --}}
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-orange-600/10 rounded-full blur-[100px]"></div>

        <div class="relative z-10">
            <div class="mb-12 flex flex-col md:flex-row items-center gap-6 border-b border-white/5 pb-10">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-amber-600 rounded-[2rem] flex items-center justify-center shadow-lg shadow-orange-500/20 transform -rotate-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.5 3.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 7.5-7.5z" />
                    </svg>
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-black text-white italic tracking-tighter uppercase leading-none">
                        Édition <span class="text-orange-500">Profil</span>
                    </h1>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Expert: {{ $technicien->prenom }} {{ $technicien->nom }}</p>
                </div>
            </div>

            <form action="{{ route('techniciens.update', $technicien->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    
                    {{-- Nom --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-orange-400 transition-colors">Nom de famille</label>
                        <input type="text" name="nom" value="{{ old('nom', $technicien->nom) }}" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-orange-500 focus:bg-white/10 transition-all outline-none placeholder:text-slate-700">
                    </div>

                    {{-- Prénom --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-orange-400 transition-colors">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom', $technicien->prenom) }}" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-orange-500 focus:bg-white/10 transition-all outline-none">
                    </div>

                    {{-- Spécialité --}}
                    <div class="group">
                        <label class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1 group-focus-within:text-orange-400 transition-colors">Habilitation Principale</label>
                        <input type="text" name="specialite" value="{{ old('specialite', $technicien->specialite) }}" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-orange-500 focus:bg-white/10 transition-all outline-none">
                    </div>

            

                {{-- Action --}}
                <div class="pt-10 border-t border-white/5">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white font-black py-5 rounded-2xl shadow-xl shadow-orange-500/20 transform transition-all active:scale-95 flex justify-center items-center group">
                        <span class="mr-4 uppercase tracking-tighter text-lg italic">MODIFIER</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                    
                    <p class="text-center text-slate-600 text-[9px] font-bold uppercase tracking-[0.4em] mt-6">Validation immédiate des modifications</p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection