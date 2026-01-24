@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    
    {{-- Fil d'ariane --}}
    <div class="mb-8">
        <a href="{{ route('reparations.index') }}" class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-colors font-bold uppercase text-[10px] tracking-[0.2em]">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-emerald-500/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </span>
            Retour au journal
        </a>
    </div>

    {{-- Alertes Erreurs --}}
    @if ($errors->any())
        <div class="mb-8 bg-red-500/10 border border-red-500/30 p-6 rounded-[2rem] flex items-center gap-4">
            <div class="bg-red-500 p-2 rounded-lg text-white">⚠️</div>
            <div>
                <h4 class="text-red-500 text-xs font-black uppercase tracking-widest">Données manquantes :</h4>
                <ul class="text-red-400/80 text-sm italic">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="glass-nav rounded-[3rem] p-8 md:p-12 border border-white/10 shadow-2xl relative overflow-hidden">
        {{-- Aura visuelle --}}
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-emerald-500/10 rounded-full blur-[80px]"></div>

        <div class="relative z-10">
            <div class="mb-12 flex items-center gap-6">
                <div class="bg-emerald-600 p-4 rounded-2xl shadow-lg shadow-emerald-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0h-3m-9 3h3m12 0h3M3 12h3m12 0h3" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-black text-white italic tracking-tighter uppercase">Nouvel <span class="text-emerald-400">Ordre de Mission</span></h1>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-1">Planification d'une intervention technique</p>
                </div>
            </div>

            <form action="{{ route('reparations.store') }}" method="POST" class="space-y-10">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    {{-- Véhicule --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Unité à traiter</label>
                        <select name="vehicule_id" required 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold appearance-none focus:border-emerald-500 outline-none transition-all cursor-pointer">
                            <option value="" class="bg-slate-900 text-slate-500">Choisir une immatriculation...</option>
                            @foreach ($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}" {{ old('vehicule_id') == $vehicule->id ? 'selected' : '' }} class="bg-slate-900 text-white italic">
                                    {{ $vehicule->immatriculation }} ({{ $vehicule->marque }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Technicien --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Expert en charge</label>
                        <select name="technicien_id" required 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold appearance-none focus:border-emerald-500 outline-none transition-all cursor-pointer">
                            <option value="" class="bg-slate-900 text-slate-500">Assigner un technicien...</option>
                            @foreach ($techniciens as $technicien)
                                <option value="{{ $technicien->id }}" {{ old('technicien_id') == $technicien->id ? 'selected' : '' }} class="bg-slate-900 text-white italic">
                                    {{ $technicien->nom }} {{ $technicien->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Date --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Date prévue</label>
                        <input type="date" name="date" value="{{ old('date') }}" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-emerald-500 outline-none transition-all [color-scheme:dark]">
                    </div>

                    {{-- Durée --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Estimation temps (Min)</label>
                        <div class="relative">
                            <input type="number" name="duree_main_oeuvre" value="{{ old('duree_main_oeuvre') }}" placeholder="Ex: 45"
                                   class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-emerald-500 outline-none transition-all">
                            <span class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-600 uppercase">Minutes</span>
                        </div>
                    </div>

                    {{-- Objet --}}
                    <div class="md:col-span-2 space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Nature de l'intervention</label>
                        <textarea name="objet_reparation" required rows="3"
                                  class="w-full bg-white/5 border border-white/10 rounded-[2rem] py-5 px-8 text-white font-medium focus:border-emerald-500 outline-none transition-all resize-none placeholder:text-slate-700 italic"
                                  placeholder="Décrivez les symptômes ou les pièces à changer...">{{ old('objet_reparation') }}</textarea>
                    </div>
                </div>

                {{-- Action --}}
                <div class="pt-6">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-black py-5 rounded-2xl shadow-xl shadow-emerald-500/20 transform transition-all active:scale-95 flex justify-center items-center group">
                        <span class="mr-4 uppercase tracking-tighter text-lg italic">Valider l'enregistrement</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection