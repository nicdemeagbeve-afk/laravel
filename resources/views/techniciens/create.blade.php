@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    
    <div class="mb-8">
        <a href="{{ route('techniciens.index') }}" class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-all">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-emerald-500/20 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </span>
            <span class="text-xs font-black uppercase tracking-[0.2em]">Annuler l'inscription</span>
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl">
            <ul class="text-red-400 text-xs font-bold italic">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-nav rounded-[2.5rem] p-8 md:p-12 border border-white/10 shadow-2xl relative overflow-hidden">
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-emerald-500/10 rounded-full blur-[80px]"></div>

        <div class="relative z-10">
            <div class="mb-10 flex items-center gap-6">
                <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-[0_0_20px_rgba(16,185,129,0.3)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-black text-white italic tracking-tighter uppercase">Nouveau <span class="text-emerald-400">Recrutement</span></h1>
                    <p class="text-slate-500 text-sm font-bold">Enregistrement d'un nouvel expert technique</p>
                </div>
            </div>

            <form action="{{ route('techniciens.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Nom --}}
                    <div>
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1">Nom de famille</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" placeholder="ex: DUPONT" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none placeholder:text-slate-600 font-bold">
                    </div>

                    {{-- Prénom --}}
                    <div>
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="ex: Jean" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none placeholder:text-slate-600 font-bold">
                    </div>

                    {{-- Spécialité --}}
                    <div class="md:col-span-2">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-3 block ml-1">Domaine d'expertise</label>
                        <input type="text" name="specialite" value="{{ old('specialite') }}" placeholder="Mécatronique, Carrosserie..." required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:border-emerald-500 transition-all outline-none placeholder:text-slate-600 font-bold">
                    </div>
                </div>

                <div class="pt-8">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-black py-5 rounded-2xl shadow-xl shadow-emerald-500/20 transform transition-all active:scale-95 flex justify-center items-center group">
                        <span class="mr-3 uppercase tracking-tighter text-lg italic">Intégrer à l'effectif</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection