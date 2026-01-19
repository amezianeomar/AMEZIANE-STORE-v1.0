@extends('Master_page')

@section('content')
<div class="relative rounded-2xl overflow-hidden min-h-[500px] md:min-h-[600px] flex items-center justify-center border border-brand-violet/50 shadow-2xl">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1538481199705-c710c4e965fc?auto=format&fit=crop&w=1920&q=80" 
             alt="Gaming bg" 
             class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-t from-[#1a0b2e] via-[#1a0b2e]/80 to-transparent"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center max-w-4xl px-4 animate-fade-in-up">
        <h1 class="font-display font-black text-5xl sm:text-6xl md:text-8xl text-white mb-6 tracking-tighter neon-text leading-tight">
            NEXT GEN <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-neon to-brand-magenta">GAMING</span>
        </h1>
        <p class="font-sans text-lg md:text-2xl text-gray-300 mb-10 max-w-2xl mx-auto px-2">
            Découvrez notre sélection ultime de consoles et périphériques pour dominer la compétition.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6 px-4 sm:px-0">
            <a href="{{ route('produits.categorie', 'consoles') }}" 
               class="w-full sm:w-auto px-8 py-4 bg-brand-violet hover:bg-brand-magenta text-white font-display font-bold uppercase tracking-widest rounded transition-all transform hover:scale-105 neon-border text-center">
                Voir les Consoles
            </a>
            <a href="{{ route('produits.categorie', 'peripheriques') }}" 
               class="w-full sm:w-auto px-8 py-4 bg-transparent border-2 border-brand-neon text-brand-neon hover:bg-brand-neon hover:text-[#1a0b2e] font-display font-bold uppercase tracking-widest rounded transition-all transform hover:scale-105 text-center">
                Périphériques
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mt-12 md:mt-16 pb-8">
    <div class="bg-brand-surface p-6 md:p-8 rounded-xl border border-white/5 hover:border-brand-neon/50 transition-colors group">
        <div class="w-12 h-12 bg-brand-violet/20 rounded-full flex items-center justify-center mb-4 group-hover:bg-brand-neon/20 transition-colors">
            <svg class="w-6 h-6 text-brand-neon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <h3 class="font-display text-xl font-bold text-white mb-2">Performance Ultime</h3>
        <p class="text-gray-400">Le meilleur matériel choisi par des experts pour des performances maximales.</p>
    </div>
    <div class="bg-brand-surface p-6 md:p-8 rounded-xl border border-white/5 hover:border-brand-magenta/50 transition-colors group">
        <div class="w-12 h-12 bg-brand-violet/20 rounded-full flex items-center justify-center mb-4 group-hover:bg-brand-magenta/20 transition-colors">
            <svg class="w-6 h-6 text-brand-magenta" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="font-display text-xl font-bold text-white mb-2">Meilleurs Prix</h3>
        <p class="text-gray-400">Des offres imbattables sur les dernières nouveautés.</p>
    </div>
    <div class="bg-brand-surface p-6 md:p-8 rounded-xl border border-white/5 hover:border-brand-violet/50 transition-colors group">
        <div class="w-12 h-12 bg-brand-violet/20 rounded-full flex items-center justify-center mb-4 group-hover:bg-brand-violet/20 transition-colors">
            <svg class="w-6 h-6 text-brand-violet" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
        <h3 class="font-display text-xl font-bold text-white mb-2">Livraison Rapide</h3>
        <p class="text-gray-400">Recevez votre équipement en 24h chrono partout en France.</p>
    </div>
</div>
@endsection
