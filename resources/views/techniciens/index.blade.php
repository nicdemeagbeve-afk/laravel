@extends('layouts.app')

@section('content')
<div class="glass-nav p-8 rounded-[2.5rem] shadow-2xl border border-white/10">
    
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
        <div>
            <h1 class="text-4xl font-black text-white tracking-tight uppercase italic">
                Équipe <span class="text-emerald-400">Technique</span>
            </h1>
            <p class="text-slate-400 font-bold text-sm mt-1 tracking-widest uppercase">Gestion du personnel qualifié</p>
        </div>
        
        <a href="{{ route('techniciens.create') }}" 
           class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-8 py-4 rounded-2xl font-black shadow-[0_10px_20px_rgba(16,185,129,0.3)] hover:shadow-emerald-500/50 transition-all transform hover:-translate-y-1 active:scale-95">
           + NOUVEAU TECHNICIEN
        </a>
    </div>

    {{-- Grille des Techniciens --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($techniciens as $technicien)
        <div class="group relative bg-white/5 border border-white/10 rounded-[2rem] p-6 transition-all duration-300 hover:bg-white/10 hover:border-emerald-500/30">
            
            <div class="flex items-center gap-5 mb-6">
                {{-- Avatar Cercle --}}
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-900 rounded-2xl flex items-center justify-center text-xl font-black text-emerald-400 border border-white/10 shadow-lg group-hover:scale-110 transition-transform">
                    {{ substr($technicien->nom, 0, 1) }}{{ substr($technicien->prenom, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-white font-black text-lg leading-tight uppercase">{{ $technicien->nom }}</h3>
                    <p class="text-emerald-400 font-bold text-sm">{{ $technicien->prenom }}</p>
                </div>
            </div>

            <div class="space-y-4 mb-8">
                <div class="flex flex-col">
                    <span class="text-[10px] text-slate-500 font-black uppercase tracking-widest mb-1">Spécialité principale</span>
                    <span class="inline-flex items-center text-emerald-400 font-bold text-sm bg-emerald-500/10 px-3 py-1 rounded-lg border border-emerald-500/20 w-fit">
                        {{ $technicien->specialite ?? 'Généraliste' }}
                    </span>
                </div>
                
                {{-- LA BARRE EXPÉRIENCE A ÉTÉ SUPPRIMÉE ICI --}}
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-2 pt-4 border-t border-white/5">
                <a href="{{ route('techniciens.show', $technicien->id) }}" class="flex-1 bg-white/5 hover:bg-white/10 text-white text-center py-2.5 rounded-xl text-[10px] font-black transition-colors border border-white/5">VOIR</a>
                <a href="{{ route('techniciens.edit', $technicien->id) }}" class="flex-1 bg-emerald-600/20 hover:bg-emerald-600/40 text-emerald-400 text-center py-2.5 rounded-xl text-[10px] font-black transition-colors border border-emerald-500/20">ÉDITER</a>
                
                <form action="{{ route('techniciens.destroy', $technicien->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Supprimer ce technicien ?')" class="px-3 py-2.5 bg-red-500/10 hover:bg-red-500/20 text-red-500 rounded-xl transition-colors border border-red-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center glass-nav rounded-[2rem]">
            <p class="text-slate-500 font-bold italic">Aucun expert n'est encore listé dans l'effectif.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection