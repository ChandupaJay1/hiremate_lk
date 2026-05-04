<x-frontend-layout title="{{ __('home.title') ?? 'HireMate LK - Find Trusted Workers' }}">
    <!-- Hero Section -->
    <section class="relative min-h-[calc(100vh-5rem)] flex items-center justify-center overflow-hidden">
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
                    <a href="{{ route('workers.index') }}" class="group relative px-8 py-4 bg-brand-500 text-white rounded-full font-semibold overflow-hidden shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 transition-all duration-300 text-center">
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
                <h2 class="text-teal-600 font-bold tracking-widest uppercase text-xs mb-3">Our Platform</h2>
                <h3 class="text-3xl md:text-5xl font-heading font-black text-gray-900 mb-4 tracking-tight">{{ __('home.services_title') ?? 'Expertise You Can Trust' }}</h3>
                <p class="text-lg text-gray-500 font-medium">{{ __('home.services_subtitle') ?? 'Whatever your project needs, we have the right professional for you.' }}</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @php
                    $services = [
                        ['title' => 'Masons', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'color' => '#f97316', 'bg' => '#fff7ed'],
                        ['title' => 'Electricians', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => '#eab308', 'bg' => '#fefce8'],
                        ['title' => 'Plumbers', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4', 'color' => '#3b82f6', 'bg' => '#eff6ff'],
                        ['title' => 'Carpenters', 'icon' => 'M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5', 'color' => '#f59e0b', 'bg' => '#fffbeb'],
                        ['title' => 'Painters', 'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z', 'color' => '#0d9488', 'bg' => '#f0fdfa'],
                        ['title' => 'Cleaners', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'color' => '#6366f1', 'bg' => '#eef2ff'],
                    ];
                @endphp

                @foreach($services as $service)
                <a href="{{ route('workers.index', ['job' => $service['title']]) }}" class="group bg-gray-50 border border-gray-100 p-6 rounded-2xl text-center hover:bg-white hover:shadow-xl hover:shadow-gray-200/50 hover:-translate-y-1 transition-all duration-300 cursor-pointer block">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 transition-all duration-300 shadow-inner group-hover:scale-110" 
                         style="background-color: {{ $service['bg'] }}; color: {{ $service['color'] }};"
                         onmouseover="this.style.backgroundColor='{{ $service['color'] }}'; this.style.color='white';"
                         onmouseout="this.style.backgroundColor='{{ $service['bg'] }}'; this.style.color='{{ $service['color'] }}';">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading font-semibold text-gray-900 group-hover:text-teal-600 transition-colors">{{ $service['title'] }}</h3>
                </a>
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

    <!-- Reviews Section -->
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-teal-600 font-bold tracking-widest uppercase text-xs mb-3">Customer Reviews</h2>
                <h3 class="text-3xl md:text-5xl font-heading font-black text-gray-900 mb-4 tracking-tight">Trusted by Thousands</h3>
                <p class="text-lg text-gray-500 font-medium">See what our customers say about their experience with HireMate LK.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $reviews = \App\Models\Review::where('approved', true)->latest()->take(3)->get();
                @endphp

                @foreach($reviews as $review)
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-brand-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-brand-600 font-bold text-lg">{{ strtoupper(substr($review->name, 0, 1)) }}</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $review->name }}</h4>
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-4">"{{ $review->comment }}"</p>
                    <p class="text-sm text-gray-500">{{ $review->service_type ? '- ' . $review->service_type . ' project' : '' }}</p>
                </div>
                @endforeach
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
</x-frontend-layout>
