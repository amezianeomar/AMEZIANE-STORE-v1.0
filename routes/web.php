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

Route::get('/a-propos', function () {
    return view('A_propos');
})->name('a_propos');

Route::get('/contact', function () {
    return view('Contact');
})->name('contact');

