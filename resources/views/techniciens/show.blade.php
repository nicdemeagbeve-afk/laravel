@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    
    {{-- Barre de navigation haute --}}
    <div class="mb-8 flex justify-between items-center">
        <a href="{{ route('techniciens.index') }}" class="group inline-flex items-center text-slate-400 hover:text-blue-400 transition-colors">
            <span class="bg-white/5 p-2 rounded-xl mr-3 group-hover:bg-blue-600/20 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </span>
            <span class="text-xs font-black uppercase tracking-[0.2em]">Retour à l'annuaire</span>
        </a>
    </div>

    <div class="glass-nav rounded-[3rem] overflow-hidden border border-white/10 shadow-2xl relative">
        
        {{-- Header Profil --}}
        <div class="bg-gradient-to-br from-slate-800/50 to-blue-900/30 p-8 md:p-12 border-b border-white/5 relative">
            <div class="absolute top-0 right-0 p-8 opacity-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-8 relative z-10">
                {{-- Avatar --}}
                <div class="w-32 h-32 rounded-[2.5rem] bg-gradient-to-tr from-blue-600 to-indigo-600 p-1 shadow-xl rotate-3">
                    <div class="w-full h-full bg-slate-900 rounded-[2.3rem] flex items-center justify-center border-2 border-white/10">
                        <span class="text-4xl font-black text-white italic">
                            {{ substr($technicien->prenom, 0, 1) }}{{ substr($technicien->nom, 0, 1) }}
                        </span>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <div class="flex items-center gap-3 justify-center md:justify-start">
                        <h1 class="text-4xl font-black text-white italic tracking-tighter uppercase leading-tight">
                            {{ $technicien->prenom }} <span class="text-blue-500">{{ $technicien->nom }}</span>
                        </h1>
                        <div class="bg-emerald-500/20 text-emerald-400 p-1 rounded-full border border-emerald-500/30" title="Compte Actif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-slate-400 font-bold uppercase tracking-widest text-xs mt-2">Expert Certifié en {{ $technicien->specialite }}</p>
                </div>
            </div>
        </div>

        {{-- Détails Techniques --}}
        <div class="p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
               

                {{-- Carte Spécialité --}}
                <div class="bg-white/5 rounded-3xl p-6 border border-white/5 group hover:border-blue-500/30 transition-all">
                    <h3 class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-4">Domaine d'Intervention</h3>
                    <p class="text-xl font-black text-white uppercase italic tracking-tighter">{{ $technicien->specialite }}</p>
                    <p class="text-slate-500 text-xs mt-2 italic">Habilité aux réparations complexes.</p>
                </div>
            </div>

            {{-- Infos Chrono Sécurisées --}}
            <div class="mt-12 pt-8 border-t border-white/5 flex flex-wrap justify-between gap-4">
                <div class="text-[10px] text-slate-600 font-bold uppercase tracking-widest">
                    Enregistré le : 
                    <span class="text-slate-400">
                        {{ $technicien->created_at ? $technicien->created_at->format('d/m/Y') : 'Date inconnue' }}
                    </span>
                </div>
                <div class="text-[10px] text-slate-600 font-bold uppercase tracking-widest">
                    Dernière activité : 
                    <span class="text-slate-400">
                        {{ $technicien->updated_at ? $technicien->updated_at->diffForHumans() : 'Jamais modifié' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Barre d'actions basse --}}
        <div class="p-8 bg-black/40 border-t border-white/10 flex gap-4">
            <a href="{{ route('techniciens.edit', $technicien->id) }}" 
   class="flex-1 bg-gradient-to-r from-orange-500 to-amber-600 text-white text-center py-4 rounded-2xl font-black uppercase tracking-[0.3em] shadow-lg shadow-orange-500/20 transform transition-all hover:scale-[1.02] active:scale-95">
    Modifier le profil
</a>
            
            <form action="{{ route('techniciens.destroy', $technicien->id) }}" method="POST" class="flex-none">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Supprimer ce profil technicien ?')" 
                        class="p-4 bg-red-500/10 border border-red-500/30 text-red-500 rounded-2xl hover:bg-red-500/20 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection