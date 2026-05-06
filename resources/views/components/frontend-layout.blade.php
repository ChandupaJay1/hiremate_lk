<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/fav_icon.png') }}">

    <title>{{ $title ?? 'HireMate LK - Find Trusted Workers' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            heading: ['Outfit', 'sans-serif'],
                        },
                        colors: {
                            brand: {
                                50: '#f0fdfa',
                                100: '#ccfbf1',
                                500: '#14b8a6',
                                600: '#0d9488',
                                900: '#134e4a',
                                950: '#042f2e',
                            },
                            amber: {
                                500: '#f59e0b',
                                600: '#d97706',
                            }
                        }
                    }
                }
            }
        </script>
    @endif
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(255,255,255,0.3);
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 selection:bg-brand-500 selection:text-white min-h-screen flex flex-col">

    <x-preloader />

    <x-navbar />

    <main class="flex-grow pt-16">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>
