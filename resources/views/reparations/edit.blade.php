@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    
    {{-- Bouton Retour --}}
    <div class="mb-8">
        <a href="{{ route('reparations.index') }}" class="group inline-flex items-center text-slate-400 hover:text-orange-400 transition-colors">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-orange-500/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg>
            </span>
            <span class="text-xs font-black uppercase tracking-[0.2em]">Abandonner les changements</span>
        </a>
    </div>

    {{-- Alertes Erreurs --}}
    @if ($errors->any())
        <div class="mb-8 bg-red-500/10 border-l-4 border-red-500 p-6 rounded-2xl animate-pulse">
            <div class="flex items-center gap-3 mb-2">
                <span class="text-red-500 font-black">!</span>
                <h4 class="text-red-500 text-xs font-black uppercase tracking-widest">Anomalies détectées :</h4>
            </div>
            <ul class="text-red-400/80 text-sm italic ml-7">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-nav rounded-[3rem] p-8 md:p-12 border border-white/10 shadow-2xl relative overflow-hidden">
        {{-- Déco --}}
        <div class="absolute -top-12 -right-12 w-48 h-48 bg-orange-500/5 rounded-full blur-3xl"></div>

        <div class="relative z-10">
            <div class="mb-12">
                <h1 class="text-3xl font-black text-white italic tracking-tighter uppercase">
                    Modifier l' <span class="text-orange-500 italic">Intervention #{{ $reparation->id }}</span>
                </h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-2">Édition des paramètres de maintenance</p>
            </div>

            <form action="{{ route('reparations.update', $reparation->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    {{-- Véhicule --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Unité Mobile (Véhicule)</label>
                        <div class="relative group">
                            <select name="vehicule_id" required 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold appearance-none focus:border-orange-500 outline-none transition-all cursor-pointer">
                                @foreach ($vehicules as $vehicule)
                                    <option value="{{ $vehicule->id }}" {{ (old('vehicule_id', $reparation->vehicule_id) == $vehicule->id) ? 'selected' : '' }} class="bg-slate-900 text-white">
                                        {{ $vehicule->immatriculation }} — {{ $vehicule->marque }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Technicien --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Opérateur Assigné</label>
                        <div class="relative group">
                            <select name="technicien_id" required 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold appearance-none focus:border-orange-500 outline-none transition-all cursor-pointer">
                                @foreach ($techniciens as $technicien)
                                    <option value="{{ $technicien->id }}" {{ (old('technicien_id', $reparation->technicien_id) == $technicien->id) ? 'selected' : '' }} class="bg-slate-900 text-white">
                                        {{ $technicien->prenom }} {{ $technicien->nom }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Date --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Date d'Intervention</label>
                        <input type="date" name="date" value="{{ old('date', $reparation->date) }}" required
                               class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-orange-500 outline-none transition-all [color-scheme:dark]">
                    </div>

                    {{-- Durée --}}
                    <div class="space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Temps Passé (Minutes)</label>
                        <div class="relative">
                            <input type="number" name="duree_main_oeuvre" value="{{ old('duree_main_oeuvre', $reparation->duree_main_oeuvre) }}"
                                   class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white font-bold focus:border-orange-500 outline-none transition-all">
                            <span class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-500 uppercase">Min.</span>
                        </div>
                    </div>

                    {{-- Objet (Pleine largeur) --}}
                    <div class="md:col-span-2 space-y-3">
                        <label class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] ml-2">Détails de l'intervention technique</label>
                        <textarea name="objet_reparation" required rows="4"
                                  class="w-full bg-white/5 border border-white/10 rounded-[2rem] py-5 px-8 text-white font-medium focus:border-orange-500 outline-none transition-all resize-none placeholder:text-slate-600 italic leading-relaxed"
                                  placeholder="Décrivez précisément les travaux effectués sur le véhicule...">{{ old('objet_reparation', $reparation->objet_reparation) }}</textarea>
                    </div>
                </div>

                {{-- Action --}}
                <div class="pt-10">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white font-black py-5 rounded-2xl shadow-xl shadow-orange-500/20 transform transition-all active:scale-95 flex justify-center items-center group">
                        <span class="mr-4 uppercase tracking-tighter text-lg">Appliquer les modifications</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:rotate-12 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection