@extends('layouts.app')

@section('content')
<div class="glass-nav p-8 rounded-[2.5rem] shadow-2xl border border-white/10">
    
    {{-- Header avec Statistiques Rapides --}}
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-black text-white tracking-tight uppercase italic">
                Journal des <span class="text-blue-400">Réparations</span>
            </h1>
            <p class="text-slate-400 font-bold text-sm mt-1 tracking-widest uppercase italic">Historique des interventions techniques</p>
        </div>
        
        <div class="flex gap-4 w-full lg:w-auto">
            <a href="{{ route('reparations.create') }}" 
               class="flex-1 lg:flex-none text-center bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-8 py-4 rounded-2xl font-black shadow-lg shadow-emerald-500/20 hover:scale-[1.02] transition-all uppercase tracking-tighter">
               + Nouvelle  
               <br> Intervention
            </a>
        </div>
    </div>

    {{-- Conteneur de Tableau --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-3">
            <thead>
                <tr class="text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Véhicule</th>
                    <th class="px-6 py-4">Expert / Technicien</th>
                    <th class="px-6 py-4">Date & Durée</th>
                    <th class="px-6 py-4">Objet de la panne</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @forelse ($reparations as $reparation)
                <tr class="group bg-white/5 hover:bg-white/10 transition-all duration-300">
                    {{-- ID --}}
                    <td class="px-6 py-5 rounded-l-[1.5rem] border-y border-l border-white/5 group-hover:border-blue-500/30">
                        <span class="font-mono text-slate-500 font-bold">#{{ str_pad($reparation->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </td>

                    {{-- Véhicule (Sticker voiture supprimé) --}}
                    <td class="px-6 py-5 border-y border-white/5 group-hover:border-blue-500/30">
                        <div>
                            <p class="font-black text-sm uppercase tracking-tighter text-blue-400">{{ $reparation->vehicule->immatriculation ?? 'INCONNU' }}</p>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">{{ $reparation->vehicule->marque ?? '' }} {{ $reparation->vehicule->modele ?? '' }}</p>
                        </div>
                    </td>

                    {{-- Technicien --}}
                    <td class="px-6 py-5 border-y border-white/5 group-hover:border-blue-500/30">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-[10px] font-black text-blue-300 border border-white/10">
                                {{ substr($reparation->technicien->nom ?? '?', 0, 1) }}
                            </div>
                            <span class="text-sm font-bold text-slate-300">{{ $reparation->technicien->prenom ?? 'Non' }} {{ $reparation->technicien->nom ?? 'Assigné' }}</span>
                        </div>
                    </td>

                    {{-- Date & Durée --}}
                    <td class="px-6 py-5 border-y border-white/5 group-hover:border-blue-500/30">
                        <p class="text-sm font-bold italic">{{ date('d/m/Y', strtotime($reparation->date)) }}</p>
                        <p class="text-[10px] text-emerald-400 font-black uppercase">{{ $reparation->duree_main_oeuvre ?? '0' }} MIN</p>
                    </td>

                    {{-- Objet --}}
                    <td class="px-6 py-5 border-y border-white/5 group-hover:border-blue-500/30">
                        <p class="text-xs text-slate-400 italic font-medium leading-tight">
                            "{{ Str::limit($reparation->objet_reparation, 45) }}"
                        </p>
                    </td>

                    {{-- Actions --}}
                    <td class="px-6 py-5 rounded-r-[1.5rem] border-y border-r border-white/5 group-hover:border-blue-500/30 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('reparations.show', $reparation->id) }}" class="p-2 bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 rounded-lg transition-colors" title="Détails">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('reparations.edit', $reparation->id) }}" class="p-2 bg-orange-500/10 hover:bg-orange-500/20 text-orange-400 rounded-lg transition-colors" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.5 3.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 7.5-7.5z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-20 text-center text-slate-500 italic font-bold">
                        Le journal de maintenance est actuellement vide.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Stylisée --}}
    <div class="mt-10 px-4">
        {{ $reparations->links() }}
    </div>
</div>

<style>
    /* Correction pour la pagination Laravel/Tailwind */
    .pagination svg { width: 1.5rem; display: inline; }
    nav[role="navigation"] { color: white; }
</style>
@endsection