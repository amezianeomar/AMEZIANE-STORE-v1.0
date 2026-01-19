# 🎮 AMEZIANE-STORE (Atelier 3 Adapted)

Ce fichier `README.md` contient **tout le code source essentiel** et les explications du projet **AMEZIANE-STORE**. Il est conçu pour donner une vision complète du projet à une IA ou un développeur sans avoir accès à tous les fichiers.

---

## 📋 Présentation du Projet

**AMEZIANE-STORE** est une application E-commerce spécialisée dans le matériel de gaming (Consoles & Périphériques). Elle est bâtie sur **Laravel** et utilise des données statiques (Tableaux PHP) pour simuler une base de données, conformément aux contraintes de l'Atelier 3.

### 🛠 Stack Technique

- **Backend** : Laravel Framework.
- **Frontend** : Blade Templates + Tailwind CSS (via CDN).
- **Interactivité Mobile** : Alpine.js.
- **Design** : Thème Dark Violet (#1a0b2e) avec accents Néon (Cyan/Magenta).
- **Déploiement** : Vercel (Runtime PHP serverless).

---

## 📂 Structure et Code Source

Voici le contenu intégral des fichiers critiques du projet.

### 1️⃣ Routes & Données (`routes/web.php`)

Ce fichier contient la "base de données" statique et la logique de routage.

```php
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

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
```

---

### 2️⃣ Layout Principal (`resources/views/Master_page.blade.php`)

Structure HTML globale avec intégration Tailwind, Alpine.js et définition du thème.

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMEZIANE-STORE | Gaming Gear</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Rajdhani:wght@300;500;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#1a0b2e',
                            violet: '#4338ca', // Indigo 700
                            neon: '#0ff', // Cyan
                            magenta: '#f0f',
                            surface: '#2d1b4e'
                        }
                    },
                    fontFamily: {
                        sans: ['Rajdhani', 'sans-serif'],
                        display: ['Orbitron', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #1a0b2e;
            color: #e2e8f0;
        }
        .neon-text {
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.7);
        }
        .neon-border {
            box-shadow: 0 0 15px rgba(255, 0, 255, 0.3);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    @include('Menu')

    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('Footer')

</body>
</html>
```

---

### 3️⃣ Menu Responsive (`resources/views/Menu.blade.php`)

Navigation avec menu Burger pour mobile via Alpine.js.

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

            <!-- Desktop Menu Items (Hidden on Mobile) -->
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
            </div>

            <!-- Mobile Menu Button -->
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

    <!-- Mobile Menu Drawer -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-full"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         class="md:hidden fixed inset-0 bg-brand-dark/95 backdrop-blur-xl z-40 flex flex-col pt-32 px-6 space-y-6 overflow-y-auto"
         x-cloak>
         <!-- (Liens Dupliqués pour Mobile) -->
         <a href="{{ route('home') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Accueil</a>
         <a href="{{ route('produits.categorie', 'consoles') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Consoles</a>
         <a href="{{ route('produits.categorie', 'peripheriques') }}" class="block text-center font-display text-2xl font-bold py-4 border-b border-white/10 hover:text-brand-neon">Périphériques</a>
    </div>
</nav>
```

---

### 4️⃣ Vue Produits (`resources/views/Produits.blade.php`)

Affichage en grille responsive avec itération Blade.

```html
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
            <div class="group bg-brand-surface rounded-xl overflow-hidden border border-white/5 hover:border-brand-neon transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full">
                <!-- Image Wrapper -->
                <div class="relative h-56 md:h-64 overflow-hidden shrink-0">
                    <img src="{{ $produit['image'] }}" alt="{{ $produit['nom'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-surface to-transparent opacity-80"></div>
                    <div class="absolute top-4 right-4 bg-brand-violet/90 backdrop-blur-sm text-white font-display font-bold px-4 py-2 rounded shadow-lg border border-brand-violet">
                        {{ $produit['prix'] }} DHS
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5 md:p-6 flex flex-col flex-grow">
                    <h3 class="font-display text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-brand-neon line-clamp-1">
                        {{ $produit['nom'] }}
                    </h3>
                    <p class="text-gray-400 text-sm mb-6 h-auto md:h-10 overflow-hidden line-clamp-2">
                        {{ $produit['desc'] }}
                    </p>
                    <button class="mt-auto w-full bg-white/5 hover:bg-brand-magenta text-white font-display font-bold py-4 md:py-3 rounded border border-white/10 hover:border-brand-magenta transition-all uppercase">
                        Ajouter
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-20 px-4">
        <h3 class="text-xl md:text-2xl text-gray-400">Aucun produit trouvé.</h3>
    </div>
@endif
@endsection
```

---

### 5️⃣ Configuration Déploiement (`vercel.json`)

Configuration critique pour le bon fonctionnement sur Vercel (Routing + Runtime).

```json
{
    "version": 2,
    "outputDirectory": "public",
    "framework": null,
    "functions": {
        "api/index.php": { "runtime": "vercel-php@0.7.1" }
    },
    "routes": [
        { "src": "/build/(.*)", "dest": "/build/$1" },
        { "src": "/assets/(.*)", "dest": "/assets/$1" },
        { "src": "/favicon.png", "dest": "/favicon.png" },
        { "src": "/favicon.ico", "dest": "/favicon.ico" },
        { "src": "/(.*)", "dest": "/api/index.php" }
    ],
    "env": {
        "APP_ENV": "production",
        "APP_DEBUG": "true",
        "APP_URL": "https://${VERCEL_URL}"
    }
}
```

---

## 🚀 Installation & Lancement

1. **Cloner le repo** : `git clone [URL]`
2. **Installer les dépendances PHP** : `composer install`
3. **Installer les dépendances JS** (optionnel si build non requis) : `npm install && npm run build`
4. **Lancer le serveur local** : `php artisan serve`
5. **Accéder au site** : `http://localhost:8000`

---

*Généré automatiquement par Ameziane-Store-Assistant.*
