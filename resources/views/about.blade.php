<x-frontend-layout>
    <x-slot name="title">{{ __('home.about_us') }} - HireMate LK</x-slot>

    <!-- Hero Section -->
    <div class="relative bg-brand-900 py-24 sm:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <svg class="h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="currentColor" class="text-brand-500"></path>
            </svg>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl font-heading font-bold tracking-tight text-white sm:text-6xl text-glow">{{ __('home.about_hero_title') }}</h1>
            <p class="mt-6 text-lg leading-8 text-brand-100 max-w-2xl mx-auto">
                {{ __('home.about_hero_subtitle') }}
            </p>
        </div>
    </div>

    <!-- Our Mission Section -->
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-none">
                <div class="lg:grid lg:grid-cols-2 lg:gap-16 lg:items-center">
                    <!-- Text Content -->
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-brand-600 uppercase tracking-widest">{{ __('home.about_mission_label') }}</h2>
                        <p class="mt-2 text-3xl font-heading font-bold tracking-tight text-gray-900 sm:text-4xl">{{ __('home.about_mission_title') }}</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600">
                            {{ __('home.about_mission_text') }}
                        </p>
                    </div>
                    <!-- Logo Image -->
                    <div class="mt-12 lg:mt-0 flex justify-center">
                        <img src="{{ asset('images/fav_icon.png') }}" alt="HireMate LK" class="w-56 h-56 rounded-3xl shadow-2xl shadow-brand-500/20 object-contain">
                    </div>
                </div>
            </div>
            
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <div class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    
                    <!-- Feature 1 -->
                    <div class="flex flex-col bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-brand-500 shadow-lg shadow-brand-500/30">
                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold leading-7 text-gray-900">{{ __('home.about_create') }}</h3>
                        <p class="mt-4 flex-auto text-base leading-7 text-gray-600">{{ __('home.about_create_desc') }}</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex flex-col bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-brand-500 shadow-lg shadow-brand-500/30">
                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold leading-7 text-gray-900">{{ __('home.about_trust') }}</h3>
                        <p class="mt-4 flex-auto text-base leading-7 text-gray-600">{{ __('home.about_trust_desc') }}</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex flex-col bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-brand-500 shadow-lg shadow-brand-500/30">
                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold leading-7 text-gray-900">{{ __('home.about_fast') }}</h3>
                        <p class="mt-4 flex-auto text-base leading-7 text-gray-600">{{ __('home.about_fast_desc') }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-brand-50">
        <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:justify-between lg:px-8">
            <h2 class="text-3xl font-heading font-bold tracking-tight text-gray-900 sm:text-4xl">
                {{ __('home.about_cta_title') }}
                <br>
                <span class="text-brand-600">{{ __('home.about_cta_subtitle') }}</span>
            </h2>
            <div class="mt-10 flex items-center gap-x-6 lg:mt-0 lg:flex-shrink-0">
                <a href="{{ route('register') }}" class="rounded-full bg-brand-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-600 transition-all duration-300 transform hover:-translate-y-1">{{ __('home.get_started') }}</a>
                <a href="{{ route('workers.index') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-brand-600 transition-colors">{{ __('home.about_find_worker') }} <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
</x-frontend-layout>
