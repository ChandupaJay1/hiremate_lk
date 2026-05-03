<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('home.title') ?? 'HireMate LK - Authentication' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
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
                                }
                            }
                        }
                    }
                }
            </script>
        @endif
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="min-h-screen flex">
            <!-- Left Side: Form Container -->
            <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white shadow-2xl z-10 w-full lg:max-w-2xl relative">
                
                <!-- Back/Home Link -->
                <div class="absolute top-8 left-8">
                    <a href="{{ url('/') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-brand-600 transition-colors">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Home
                    </a>
                </div>

                <div class="mx-auto w-full max-w-sm lg:w-96">
                    {{ $slot }}
                </div>
            </div>

            <!-- Right Side: Image/Branding Background -->
            <div class="hidden lg:block relative w-0 flex-1 bg-brand-900">
                <img class="absolute inset-0 h-full w-full object-cover opacity-80 mix-blend-overlay" src="{{ asset('images/auth_bg.png') }}" alt="Blueprint and construction tools">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-950/90 via-brand-900/40 to-transparent"></div>
                
                <!-- Optional Branding Text Overlay -->
                <div class="absolute bottom-12 left-12 right-12 text-white">
                    <blockquote class="space-y-4">
                        <p class="text-3xl font-heading font-semibold leading-snug">
                            "Connecting skilled hands with those who need them. Building a better community, one job at a time."
                        </p>
                        <footer class="text-brand-100 font-medium">The HireMate LK Team</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </body>
</html>
