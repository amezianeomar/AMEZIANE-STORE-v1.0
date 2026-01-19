@extends('Master_page')

@section('content')
<div class="max-w-4xl mx-auto text-center md:text-left">
    <div class="mb-12 text-center">
        <h1 class="font-display font-bold text-4xl md:text-5xl text-white mb-4">
            NOTRE <span class="text-brand-magenta">MISSION</span>
        </h1>
        <div class="h-1 w-24 bg-brand-neon rounded mx-auto shadow-[0_0_15px_rgba(0,255,255,0.5)]"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
        <div class="order-2 md:order-1 space-y-6 text-gray-300 leading-relaxed font-sans text-lg">
            <p>
                <strong class="text-white text-xl">AMEZIANE-STORE</strong> n'est pas juste une boutique, c'est le QG des passionnés. 
                Né à Tanger d'une volonté de fournir aux joueurs marocains le matériel qu'ils méritent, nous sélectionnons rigoureusement chaque périphérique.
            </p>
            <p>
                Que vous soyez un joueur compétitif cherchant à réduire votre latence ou un explorateur de mondes ouverts exigeant une immersion totale, 
                notre catalogue est calibré pour la <span class="text-brand-neon font-bold">performance</span>.
            </p>
            
            <div class="grid grid-cols-2 gap-4 pt-4">
                <div class="bg-brand-surface p-4 rounded border border-white/5 text-center">
                    <span class="block font-display text-3xl text-brand-magenta font-bold">100%</span>
                    <span class="text-sm uppercase tracking-widest">Gaming</span>
                </div>
                <div class="bg-brand-surface p-4 rounded border border-white/5 text-center">
                    <span class="block font-display text-3xl text-brand-neon font-bold">24h</span>
                    <span class="text-sm uppercase tracking-widest">Livraison</span>
                </div>
            </div>
        </div>

        <div class="order-1 md:order-2 relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-brand-neon to-brand-magenta rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative rounded-lg overflow-hidden border border-white/10">
                <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80" alt="Setup Gaming" class="w-full object-cover transform transition duration-500 hover:scale-105">
            </div>
        </div>
    </div>

    <div class="bg-brand-surface rounded-xl p-8 border border-white/5 text-center">
        <h2 class="font-display text-2xl text-white mb-6">LA TEAM</h2>
        <div class="inline-block">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-brand-violet to-brand-magenta rounded-full flex items-center justify-center mb-4 border-2 border-white/20">
                <span class="font-display text-3xl text-white font-bold">OA</span>
            </div>
            <h3 class="text-xl font-bold text-white">Omar AMEZIANE</h3>
            <p class="text-brand-neon text-sm uppercase tracking-widest">Founder & Lead Dev</p>
        </div>
    </div>
</div>
@endsection