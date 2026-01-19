@extends('Master_page')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center">
    <h1 class="font-display font-black text-9xl text-brand-neon mb-4 animate-pulse" style="text-shadow: 0 0 30px rgba(0,255,255,0.5)">
        404
    </h1>
    <h2 class="font-display font-bold text-4xl text-white mb-8">
        GAME OVER
    </h2>
    <p class="text-xl text-gray-400 mb-10 max-w-lg">
        Le niveau que vous essayez d'atteindre n'existe pas ou a été supprimé par les administrateurs du serveur.
    </p>
    
    <a href="{{ route('home') }}" 
       class="px-10 py-4 bg-brand-violet hover:bg-brand-magenta text-white font-display font-bold uppercase tracking-widest rounded transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(67,56,202,0.5)] hover:shadow-[0_0_30px_rgba(240,0,255,0.6)]">
        Retry / Restart
    </a>
</div>
@endsection
