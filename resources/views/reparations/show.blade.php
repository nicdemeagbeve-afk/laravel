@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    {{-- Bouton Retour --}}
    <div class="mb-8">
        <a href="{{ route('reparations.index') }}" class="group inline-flex items-center text-slate-400 hover:text-blue-400 transition-colors">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-blue-600/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </span>
            <span class="text-xs font-black uppercase tracking-[0.2em]">Retour aux interventions</span>
        </a>
    </div>

    <div class="glass-nav rounded-[3rem] overflow-hidden border border-white/10 shadow-2xl relative">
        
        {{-- En-tête : État de l'intervention --}}
        <div class="bg-gradient-to-r from-blue-900/40 to-slate-900/40 p-8 border-b border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-5">
                <div class="bg-blue-600 p-3 rounded-2xl shadow-[0_0_15px_rgba(37,99,235,0.4)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-white italic uppercase tracking-tighter">Rapport <span class="text-blue-400">#{{ $reparation->id }}</span></h1>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-widest">Émis le {{ \Carbon\Carbon::parse($reparation->date)->format('d F Y') }}</p>
                </div>
            </div>
            <div class="bg-emerald-500/10 border border-emerald-500/30 px-6 py-2 rounded-full">
                <span class="text-emerald-400 text-xs font-black uppercase tracking-widest italic">Intervention Terminée</span>
            </div>
        </div>

        <div class="p-8 md:p-12 space-y-12">
            
            {{-- Grille Duo : Véhicule & Technicien --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Carte Véhicule --}}
                <div class="bg-white/5 rounded-[2rem] p-6 border border-white/5 relative group">
                    <span class="absolute top-6 right-6 text-slate-700 font-black text-4xl opacity-20 group-hover:text-blue-500 transition-colors italic">01</span>
                    <h3 class="text-blue-400 text-xs font-black uppercase tracking-widest mb-6">Unité de Maintenance</h3>
                    <p class="text-white text-xl font-black italic">{{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}</p>
                    <p class="text-slate-400 font-mono mt-1">{{ $reparation->vehicule->immatriculation }}</p>
                </div>

                {{-- Carte Technicien --}}
                <div class="bg-white/5 rounded-[2rem] p-6 border border-white/5 relative group">
                    <span class="absolute top-6 right-6 text-slate-700 font-black text-4xl opacity-20 group-hover:text-blue-500 transition-colors italic">02</span>
                    <h3 class="text-blue-400 text-xs font-black uppercase tracking-widest mb-6">Expert assigné</h3>
                    <p class="text-white text-xl font-black italic">{{ $reparation->technicien->prenom }} {{ $reparation->technicien->nom }}</p>
                    <p class="text-slate-400 font-bold text-xs uppercase mt-1 tracking-tighter">{{ $reparation->technicien->specialite }}</p>
                </div>
            </div>

            {{-- Bloc Détails Travaux --}}
            <div class="relative">
                <div class="absolute inset-0 bg-blue-600/5 blur-3xl rounded-full"></div>
                <div class="relative bg-black/40 rounded-[2.5rem] p-8 md:p-10 border border-white/10 shadow-inner">
                    <h3 class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em] mb-6">Description des travaux effectués</h3>
                    <div class="text-slate-200 leading-relaxed text-lg italic font-medium">
                        "{{ $reparation->objet_reparation }}"
                    </div>
                    
                    <div class="mt-10 grid grid-cols-2 md:grid-cols-3 gap-6 pt-10 border-t border-white/5">
                        <div>
                            <p class="text-slate-500 text-[10px] font-black uppercase mb-1">Main d'œuvre</p>
                            <p class="text-white font-black text-lg">{{ $reparation->duree_main_oeuvre ?? '0' }} <span class="text-xs text-blue-400">MIN</span></p>
                        </div>
                        @if($reparation->cout)
                        <div class="col-span-1 md:col-span-2 text-right md:text-left">
                            <p class="text-slate-500 text-[10px] font-black uppercase mb-1">Facturation Totale</p>
                            <p class="text-emerald-400 font-black text-2xl tracking-tighter">{{ number_format($reparation->cout, 0, ',', ' ') }} <span class="text-sm">FCFA</span></p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        {{-- Barre d'actions --}}
        <div class="p-8 bg-black/40 border-t border-white/10 flex flex-wrap gap-4">
           <a href="{{ route('reparations.edit', $reparation->id) }}" 
   class="flex-1 min-w-[200px] bg-gradient-to-r from-orange-500 to-amber-600 text-white text-center py-4 rounded-2xl font-black uppercase tracking-widest [word-spacing:1.5rem] shadow-lg shadow-orange-500/20 transform transition-all hover:scale-[1.02] active:scale-95">
    Modifier l'intervention
</a>
            
            <form action="{{ route('reparations.destroy', $reparation->id) }}" method="POST" class="flex-none">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Archiver et supprimer définitivement ce rapport ?')" 
                        class="px-8 py-4 bg-red-500/10 border border-red-500/30 text-red-500 rounded-2xl font-black hover:bg-red-500/20 transition-all uppercase text-sm tracking-widest">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection