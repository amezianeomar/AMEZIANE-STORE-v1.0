<nav class="bg-brand-surface border-b border-white/10 relative z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 group z-50 relative">
                <div class="w-10 h-10 bg-gradient-to-br from-brand-violet to-brand-magenta rounded flex items-center justify-center transform group-hover:rotate-12 transition-transform shadow-[0_0_15px_rgba(240,0,255,0.5)]">
                    <span class="font-display font-bold text-xl text-white">A</span>
                </div>
                <span class="font-display font-bold text-2xl tracking-wider text-white group-hover:text-brand-neon transition-colors drop-shadow-lg">
                    AMEZIANE<span class="text-brand-magenta">-STORE</span>
                </span>
            </a>

            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->routeIs('home') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">
                    Accueil
                </a>
                
                <a href="{{ route('produits.categorie', 'consoles') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->is('produits/consoles') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">
                    Consoles
                </a>
                <a href="{{ route('produits.categorie', 'peripheriques') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->is('produits/peripheriques') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">
                    Périphériques
                </a>

                <a href="{{ route('a_propos') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->routeIs('a_propos') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">
                    À Propos
                </a>
                <a href="{{ route('contact') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->routeIs('contact') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">
                    Contact
                </a>
            </div>

            <div class="md:hidden z-50 relative">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-brand-neon focus:outline-none transition-colors p-2">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-full"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         class="md:hidden fixed inset-0 bg-brand-dark/95 backdrop-blur-xl z-40 flex flex-col pt-32 px-6 space-y-6 overflow-y-auto"
         x-cloak>
         
         <a href="{{ route('home') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon {{ request()->routeIs('home') ? 'text-brand-neon' : 'text-white' }}">Accueil</a>
         <a href="{{ route('produits.categorie', 'consoles') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon {{ request()->is('produits/consoles') ? 'text-brand-neon' : 'text-white' }}">Consoles</a>
         <a href="{{ route('produits.categorie', 'peripheriques') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon {{ request()->is('produits/peripheriques') ? 'text-brand-neon' : 'text-white' }}">Périphériques</a>
         
         <a href="{{ route('a_propos') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon {{ request()->routeIs('a_propos') ? 'text-brand-neon' : 'text-white' }}">À Propos</a>
         <a href="{{ route('contact') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon {{ request()->routeIs('contact') ? 'text-brand-neon' : 'text-white' }}">Contact</a>

         <!-- Mobile Footer Info -->
        <div class="mt-auto pb-10 text-center">
            <p class="text-gray-500 text-sm font-sans uppercase tracking-widest mb-4">Suivez-nous</p>
            <div class="flex justify-center space-x-8">
                <a href="#" class="text-gray-400 hover:text-brand-neon"><span class="sr-only">Twitter</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg></a>
                <a href="#" class="text-gray-400 hover:text-brand-magenta"><span class="sr-only">Instagram</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465 1.067-.047 1.407-.06 3.808-.06h.63zm2.595 14.53a1.53 1.53 0 110-3.06 1.53 1.53 0 010 3.06zm-1.587-14c-2.67 0-3.001.01-4.053.058-1.048.048-1.762.207-2.386.45a3.72 3.72 0 00-1.348.879 3.72 3.72 0 00-.88 1.348c-.242.624-.402 1.338-.45 2.386-.047 1.052-.058 1.383-.058 4.053 0 2.67.01 3.001.058 4.053.048 1.048.207 1.762.45 2.386a3.72 3.72 0 00.88 1.348 3.72 3.72 0 001.348.879c.624.242 1.338.402 2.386.45 1.052.047 1.383.058 4.053.058 2.67 0 3.001-.01 4.053-.058 1.048-.048 1.762-.207 2.386-.45a3.72 3.72 0 001.348-.879 3.72 3.72 0 00.88-1.348c.242-.624.402-1.338.45-2.386.047-1.052.058-1.383.058-4.053 0-2.67-.01-3.001-.058-4.053-.048-1.048-.207-1.762-.45-2.386a3.72 3.72 0 00-.879-1.348 3.72 3.72 0 00-1.348-.88c-.624-.242-1.338-.402-2.386-.45-1.052-.047-1.383-.058-4.053-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.8a3.335 3.335 0 100 6.67 3.335 3.335 0 000-6.67z" clip-rule="evenodd"/></svg></a>
            </div>
        </div>
    </div>
</nav>