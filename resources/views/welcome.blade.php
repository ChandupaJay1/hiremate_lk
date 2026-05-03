<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ __('home.title') ?? 'HireMate LK - Find Trusted Workers' }}</title>

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
            .text-glow {
                text-shadow: 0 0 20px rgba(255,255,255,0.3);
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50 selection:bg-brand-500 selection:text-white">
        
        <!-- Navigation -->
        <nav class="fixed w-full z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-gray-200" id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white font-heading font-bold text-xl shadow-lg">
                            H
                        </div>
                        <h1 class="text-2xl font-heading font-bold bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600">HireMate LK</h1>
                    </div>
                    <div class="hidden md:flex items-center space-x-6">
                        <!-- Language Switcher -->
                        <div class="relative group">
                            <select class="appearance-none bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 pl-4 pr-10 rounded-full border-none focus:ring-2 focus:ring-brand-500 transition-colors cursor-pointer text-sm" onchange="changeLanguage(this.value)">
                                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                <option value="si" {{ app()->getLocale() == 'si' ? 'selected' : '' }}>සිංහල</option>
                                <option value="ta" {{ app()->getLocale() == 'ta' ? 'selected' : '' }}>தமிழ்</option>
                            </select>
                            <svg class="w-4 h-4 text-gray-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>

                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-red-600 font-medium transition-colors ml-4">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">{{ __('home.login') ?? 'Log in' }}</a>
                            <a href="{{ route('register') }}" class="bg-gray-900 text-white px-6 py-2.5 rounded-full font-medium hover:bg-brand-600 hover:shadow-lg hover:shadow-brand-500/30 transition-all duration-300 transform hover:-translate-y-0.5">{{ __('home.register') ?? 'Sign up' }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/hero_bg.png') }}" alt="Construction Workers" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950/90 via-brand-900/80 to-transparent"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="max-w-2xl">
                    <span class="inline-block py-1 px-3 rounded-full bg-brand-500/20 border border-brand-400/30 text-brand-100 text-sm font-semibold tracking-wide mb-6 backdrop-blur-md">
                        #1 Services Platform in Sri Lanka
                    </span>
                    <h1 class="text-5xl md:text-7xl font-heading font-bold text-white mb-6 leading-tight text-glow">
                        {{ __('home.hero_title') ?? 'Find the Right Hand for the Job.' }}
                    </h1>
                    <p class="text-xl text-gray-200 mb-10 font-light leading-relaxed max-w-xl">
                        {{ __('home.hero_subtitle') ?? 'Connect with verified masons, electricians, and plumbers instantly. Professional services at your fingertips.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-brand-500 text-white rounded-full font-semibold overflow-hidden shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 transition-all duration-300 text-center">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                {{ __('home.hero_cta_customer') ?? 'Find a Worker' }}
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                            <div class="absolute inset-0 h-full w-full bg-gradient-to-r from-brand-600 to-brand-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <a href="{{ route('register') }}" class="glass text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all duration-300 text-center flex items-center justify-center gap-2">
                            {{ __('home.hero_cta_worker') ?? 'Join as a Worker' }}
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-brand-600 font-semibold tracking-wide uppercase text-sm mb-2">{{ __('home.services_label') ?? 'Our Services' }}</h2>
                    <h3 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">{{ __('home.services_title') ?? 'Expertise You Can Trust' }}</h3>
                    <p class="text-lg text-gray-500">{{ __('home.services_subtitle') ?? 'Whatever your project needs, we have the right professional for you.' }}</p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @php
                        $services = [
                            ['title' => __('home.service_masons') ?? 'Masons', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'color' => 'orange'],
                            ['title' => __('home.service_electricians') ?? 'Electricians', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'yellow'],
                            ['title' => __('home.service_plumbers') ?? 'Plumbers', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4', 'color' => 'blue'],
                            ['title' => __('home.service_carpenters') ?? 'Carpenters', 'icon' => 'M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5', 'color' => 'amber'],
                            ['title' => __('home.service_painters') ?? 'Painters', 'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z', 'color' => 'teal'],
                            ['title' => __('home.service_cleaners') ?? 'Cleaners', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'color' => 'indigo'],
                        ];
                    @endphp

                    @foreach($services as $service)
                    <div class="group bg-gray-50 border border-gray-100 p-6 rounded-2xl text-center hover:bg-white hover:shadow-xl hover:shadow-gray-200/50 hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 bg-{{ $service['color'] }}-100 text-{{ $service['color'] }}-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 group-hover:bg-{{ $service['color'] }}-500 group-hover:text-white shadow-inner">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}"></path>
                            </svg>
                        </div>
                        <h3 class="font-heading font-semibold text-gray-900 group-hover:text-{{ $service['color'] }}-600 transition-colors">{{ $service['title'] }}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-24 bg-gray-50 border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-brand-50 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-gray-900 mb-3">{{ __('home.feature_verified') ?? 'Verified Professionals' }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ __('home.feature_verified_desc') ?? 'Every worker on our platform undergoes a strict verification process to ensure quality and reliability.' }}</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-gray-900 mb-3">{{ __('home.feature_secure') ?? 'Secure Bookings' }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ __('home.feature_secure_desc') ?? 'Your bookings and payments are protected. Experience peace of mind with our secure platform.' }}</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 3v6m0 6v6m6-12h-6m-6 0h-6"></path></svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-gray-900 mb-3">{{ __('home.feature_support') ?? '24/7 Support' }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ __('home.feature_support_desc') ?? 'Our dedicated support team is always ready to assist you with any questions or concerns.' }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 relative overflow-hidden bg-brand-900">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-brand-600 rounded-full blur-3xl opacity-30"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-brand-500 rounded-full blur-3xl opacity-30"></div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-white mb-6">Ready to get started?</h2>
                <p class="text-xl text-brand-100 mb-10">Join thousands of users who trust HireMate LK for their service needs.</p>
                <a href="{{ route('register') }}" class="inline-block bg-white text-brand-900 px-8 py-4 rounded-full font-bold hover:bg-gray-50 transition-colors shadow-xl">Create your account</a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-950 text-gray-300 py-16 border-t border-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-brand-500 flex items-center justify-center text-white font-heading font-bold">H</div>
                            <h3 class="text-xl font-heading font-bold text-white">HireMate LK</h3>
                        </div>
                        <p class="text-gray-400 max-w-md">{{ __('home.footer_about_text') ?? 'Connecting skilled professionals with customers across Sri Lanka. Building a community of trust and reliable services.' }}</p>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-6 uppercase tracking-wider text-sm">{{ __('home.footer_links') ?? 'Quick Links' }}</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="hover:text-brand-400 transition-colors">About Us</a></li>
                            <li><a href="#" class="hover:text-brand-400 transition-colors">How It Works</a></li>
                            <li><a href="#" class="hover:text-brand-400 transition-colors">Safety Guide</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-6 uppercase tracking-wider text-sm">{{ __('home.footer_contact') ?? 'Contact' }}</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                support@hirematelk.com
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                +94 11 123 4567
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-gray-500">&copy; {{ date('Y') }} HireMate LK. All rights reserved.</p>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-500 hover:text-white transition-colors"><span class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                        <a href="#" class="text-gray-500 hover:text-white transition-colors"><span class="sr-only">Twitter</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            function changeLanguage(lang) {
                const url = new URL(window.location);
                url.searchParams.set('lang', lang);
                window.location.href = url.toString();
            }

            // Navbar scroll effect
            window.addEventListener('scroll', () => {
                const nav = document.getElementById('navbar');
                if (window.scrollY > 10) {
                    nav.classList.add('shadow-sm');
                } else {
                    nav.classList.remove('shadow-sm');
                }
            });
        </script>
    </body>
</html>
