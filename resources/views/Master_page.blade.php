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
