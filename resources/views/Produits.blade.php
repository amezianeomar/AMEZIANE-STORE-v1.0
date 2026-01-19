@extends('Master_page')

@section('content')
<div class="mb-8 md:mb-12 text-center md:text-left px-2">
    <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-4">
        CATÉGORIE <span class="text-brand-neon">/</span> {{ strtoupper($titre) }}
    </h2>
    <div class="h-1 w-20 bg-brand-magenta rounded mx-auto md:mx-0"></div>
</div>

@if(count($liste) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 pb-8">
        @foreach($liste as $produit)
            <div class="group bg-brand-surface rounded-xl overflow-hidden border border-white/5 hover:border-brand-neon transition-all duration-300 transform active:scale-95 hover:-translate-y-2 hover:shadow-[0_0_20px_rgba(0,255,255,0.2)] flex flex-col h-full">
                <!-- Image Wrapper -->
                <div class="relative h-56 md:h-64 overflow-hidden shrink-0">
                    <img src="{{ $produit['image'] }}" 
                         alt="{{ $produit['nom'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-surface to-transparent opacity-80"></div>
                    
                    <!-- Price Badge -->
                    <div class="absolute top-4 right-4 bg-brand-violet/90 backdrop-blur-sm text-white font-display font-bold px-4 py-2 rounded shadow-lg border border-brand-violet">
                        {{ $produit['prix'] }} DHS
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5 md:p-6 flex flex-col flex-grow">
                    <h3 class="font-display text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-brand-neon transition-colors line-clamp-1">
                        {{ $produit['nom'] }}
                    </h3>
                    <p class="text-gray-400 text-sm mb-6 h-auto md:h-10 overflow-hidden line-clamp-2">
                        {{ $produit['desc'] }}
                    </p>
                    
                    <button class="mt-auto w-full bg-white/5 hover:bg-brand-magenta text-white font-display font-bold py-4 md:py-3 rounded border border-white/10 hover:border-brand-magenta transition-all uppercase tracking-wider flex items-center justify-center gap-2 group-hover:shadow-[0_0_15px_rgba(255,0,255,0.4)] active:bg-brand-magenta/80">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Ajouter
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-20 px-4">
        <h3 class="text-xl md:text-2xl text-gray-400">Aucun produit trouvé dans cette catégorie.</h3>
    </div>
@endif
@endsection
