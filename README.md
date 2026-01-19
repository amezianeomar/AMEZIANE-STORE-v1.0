# 🎮 AMEZIANE-STORE

Ce fichier `README.md` est le **document de référence complet** du projet. Il contient le code source des fichiers clés pour permettre une analyse contextuelle par une IA externe (Gemini, ChatGPT) sans accès direct au système de fichiers.

---

## 📋 Présentation du Projet

**AMEZIANE-STORE** est une application E-commerce développée avec **Laravel**, spécialisée dans le matériel de gaming. Elle respecte les contraintes de l'Atelier 3 tout en proposant une interface moderne et immersive.

### 🛠 Stack Technique

- **Backend** : Laravel Framework.
- **Frontend** : Blade Templates + Tailwind CSS (CDN) + Alpine.js.
- **Thème** : Dark Violet (#1a0b2e) / Néon (#0ff, #f0f).
- **Fonctionnalités** : Catalogue produits, Pages statiques (À Propos, Contact), Design Responsive.

---

## 📂 Structure et Code Source

Voici le contenu intégral des fichiers critiques du projet, mis à jour avec les dernières fonctionnalités (Pages À Propos et Contact).

### 1️⃣ Routes & Données (`routes/web.php`)

Définition des données statiques et de l'ensemble des routes (Accueil, Produits, Pages institutionnelles).

```php
<?php

use Illuminate\Support\Facades\Route;

$produits = [
    'consoles' => [
        [
            'nom' => 'PS5 Slim',
            'prix' => 549,
            'image' => 'https://images.unsplash.com/photo-1606813907291-d86efa9b94db?auto=format&fit=crop&w=600&q=80',
            'desc' => 'La nouvelle PS5, plus fine, même puissance.'
        ],
        [
            'nom' => 'Xbox Series X',
            'prix' => 499,
            'image' => 'https://gamingstore.ma/253-medium_default/console-xbox-series-x.jpg',
            'desc' => 'La console la plus puissante de Microsoft.'
        ],
        [
            'nom' => 'Nintendo Switch OLED',
            'prix' => 319,
            'image' => 'https://www.materielmaroc.com/wp-content/uploads/2024/11/nintendo-switech-oled.jpg',
            'desc' => 'Écran OLED vibrant pour jouer partout.'
        ]
    ],
    'peripheriques' => [
        [
            'nom' => 'Clavier Mécanique RGB',
            'prix' => 129,
            'image' => 'https://maxgaming.ma/wp-content/uploads/2025/02/maxgaming-maroc-rabat-sale-SPIRIT-OF-GAMER-PROK1-Semi-Mechanical-RGB-Gaming-Keyboard-1.webp',
            'desc' => 'Switches mécaniques et éclairage infini.'
        ],
        [
            'nom' => 'Souris Logitech G Pro',
            'prix' => 99,
            'image' => 'https://techspace.ma/cdn/shop/files/LogitechGProXSuperlight2Lightspeed_Black.png?v=1739275713',
            'desc' => 'Précision chirurgicale sans fil.'
        ],
        [
            'nom' => 'Casque HyperX Cloud',
            'prix' => 79,
            'image' => 'https://duga.ma/wp-content/uploads/2024/12/94377153_8344054165.jpg',
            'desc' => 'Confort ultime pour longues sessions.'
        ]
    ]
];

Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/produits/{cat}', function ($cat) use ($produits) {
    if (!array_key_exists($cat, $produits)) {
        abort(404);
    }
    return view('Produits', [
        'titre' => ucfirst($cat),
        'liste' => $produits[$cat]
    ]);
})->name('produits.categorie');

Route::get('/a-propos', function () {
    return view('A_propos');
})->name('a_propos');

Route::get('/contact', function () {
    return view('Contact');
})->name('contact');
```

---

### 2️⃣ Menu Navigation (`resources/views/Menu.blade.php`)

Intègre désormais les liens vers "À Propos" et "Contact", compatible Desktop et Mobile.

```html
<nav class="bg-brand-surface border-b border-white/10 relative z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 group z-50 relative">
                <div class="w-10 h-10 bg-gradient-to-br from-brand-violet to-brand-magenta rounded flex items-center justify-center transform group-hover:rotate-12 transition-transform shadow-[0_0_15px_rgba(240,0,255,0.5)]">
                    <span class="font-display font-bold text-xl text-white">A</span>
                </div>
                <span class="font-display font-bold text-2xl tracking-wider text-white group-hover:text-brand-neon transition-colors drop-shadow-lg">
                    AMEZIANE<span class="text-brand-magenta">-STORE</span>
                </span>
            </a>

            <!-- Desktop Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->routeIs('home') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">Accueil</a>
                <a href="{{ route('produits.categorie', 'consoles') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->is('produits/consoles') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">Consoles</a>
                <a href="{{ route('produits.categorie', 'peripheriques') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->is('produits/peripheriques') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">Périphériques</a>
                
                <!-- New Links -->
                <a href="{{ route('a_propos') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->routeIs('a_propos') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">À Propos</a>
                <a href="{{ route('contact') }}" class="font-display text-sm font-medium text-gray-300 hover:text-brand-neon transition-colors uppercase tracking-widest hover:border-b-2 hover:border-brand-neon py-2 {{ request()->routeIs('contact') ? 'text-brand-neon border-b-2 border-brand-neon' : '' }}">Contact</a>
            </div>

            <!-- Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white hover:text-brand-neon p-2">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div x-show="mobileMenuOpen" class="md:hidden fixed inset-0 bg-brand-dark/95 backdrop-blur-xl z-40 flex flex-col pt-32 px-6 space-y-6 overflow-y-auto" x-cloak>
         <a href="{{ route('home') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Accueil</a>
         <a href="{{ route('produits.categorie', 'consoles') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Consoles</a>
         <a href="{{ route('produits.categorie', 'peripheriques') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Périphériques</a>
         <a href="{{ route('a_propos') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">À Propos</a>
         <a href="{{ route('contact') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Contact</a>
    </div>
</nav>
```

---

### 3️⃣ Page À Propos (`resources/views/A_propos.blade.php`)

Présentation de la mission et de l'équipe (Omar AMEZIANE).

```html
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
            <p><strong class="text-white text-xl">AMEZIANE-STORE</strong> est le QG des passionnés, né à Tanger.</p>
            <p>Notre catalogue est calibré pour la <span class="text-brand-neon font-bold">performance</span>.</p>
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
            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80" alt="Setup Gaming" class="w-full object-cover rounded-lg border border-white/10">
        </div>
    </div>

    <div class="bg-brand-surface rounded-xl p-8 border border-white/5 text-center">
        <h2 class="font-display text-2xl text-white mb-6">LA TEAM</h2>
        <div class="inline-block">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-brand-violet to-brand-magenta rounded-full flex items-center justify-center mb-4 text-3xl text-white font-bold font-display border-2 border-white/20">OA</div>
            <h3 class="text-xl font-bold text-white">Omar AMEZIANE</h3>
            <p class="text-brand-neon text-sm uppercase tracking-widest">Founder & Lead Dev</p>
        </div>
    </div>
</div>
@endsection
```

---

### 4️⃣ Page Contact (`resources/views/Contact.blade.php`)

Formulaire de contact avec design Néon/Glassmorphism.

```html
@extends('Master_page')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="text-center mb-10">
        <h1 class="font-display font-bold text-4xl text-white mb-2">CONTACTEZ <span class="text-brand-neon">NOUS</span></h1>
        <p class="text-gray-400">Besoin d'un conseil sur votre setup ?</p>
    </div>

    <div class="bg-brand-surface p-8 rounded-xl border border-white/10 shadow-[0_0_30px_rgba(67,56,202,0.15)] relative overflow-hidden">
        <form action="#" class="relative z-10 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-sm font-display font-bold text-gray-300 uppercase">Nom du Joueur</label>
                    <input type="text" class="w-full bg-brand-dark border border-white/10 rounded p-3 text-white focus:border-brand-neon transition-all" placeholder="Votre pseudo">
                </div>
                <div>
                    <label class="text-sm font-display font-bold text-gray-300 uppercase">Email</label>
                    <input type="email" class="w-full bg-brand-dark border border-white/10 rounded p-3 text-white focus:border-brand-neon transition-all" placeholder="email@exemple.com">
                </div>
            </div>
            <div>
                <label class="text-sm font-display font-bold text-gray-300 uppercase">Message</label>
                <textarea rows="5" class="w-full bg-brand-dark border border-white/10 rounded p-3 text-white focus:border-brand-neon transition-all"></textarea>
            </div>
            <button type="button" class="w-full bg-gradient-to-r from-brand-violet to-brand-magenta text-white font-display font-bold py-4 rounded shadow-lg uppercase tracking-widest hover:translate-y-[-2px] transition-all">
                Envoyer le message
            </button>
        </form>
    </div>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
        <div class="p-4 rounded border border-white/5 bg-white/5"><p class="text-sm text-gray-300">📍 Tanger, Maroc</p></div>
        <div class="p-4 rounded border border-white/5 bg-white/5"><p class="text-sm text-gray-300">✉️ contact@ameziane.store</p></div>
        <div class="p-4 rounded border border-white/5 bg-white/5"><p class="text-sm text-gray-300">📞 +212 6 79 14 15 40</p></div>
    </div>
</div>
@endsection
```

---

### 5️⃣ Configuration Déploiement (`vercel.json`)

Configuration pour le déploiement serverless.

```json
{
    "version": 2,
    "outputDirectory": "public",
    "functions": { "api/index.php": { "runtime": "vercel-php@0.7.1" } },
    "routes": [
        { "src": "/build/(.*)", "dest": "/build/$1" },
        { "src": "/assets/(.*)", "dest": "/assets/$1" },
        { "src": "/favicon.png", "dest": "/favicon.png" },
        { "src": "/(.*)", "dest": "/api/index.php" }
    ]
}
```

---

*Généré pour documentation externe et analyse IA.*
