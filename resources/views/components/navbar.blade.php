<nav x-data="{ mobileMenuOpen: false }" class="fixed w-full z-50 transition-all duration-300 bg-white/90 backdrop-blur-md border-b border-gray-200" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/fav_icon.png') }}" alt="HireMate LK Logo" class="w-10 h-10 object-contain rounded-xl shadow-lg">
                    <h1 class="text-2xl font-heading font-bold bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600">HireMate LK</h1>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Navigation Links -->
                <a href="{{ route('workers.index') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">{{ __('home.find_workers') }}</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">{{ __('home.about_us') }}</a>

                @auth
                    @if(auth()->user()->role === 'worker')
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">{{ __('home.dashboard') }}</a>
                    @endif
                    <div class="relative ml-4">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center p-1 rounded-xl hover:bg-gray-50 transition-all duration-200 group border border-transparent hover:border-gray-100 focus:outline-none">
                                    <div class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white text-sm font-black shadow-sm group-hover:shadow-md transition-all ring-4 ring-transparent group-hover:ring-brand-50">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @if(auth()->user()->role === 'admin')
                                    <x-dropdown-link :href="route('admin.profile.edit')">
                                        {{ __('home.profile') }}
                                    </x-dropdown-link>
                                @else
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('home.profile') }}
                                    </x-dropdown-link>
                                @endif

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="text-red-600 font-bold">
                                        {{ __('home.logout') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">{{ __('home.login') }}</a>
                    <a href="{{ route('register') }}" class="bg-gray-900 text-white px-6 py-2.5 rounded-full font-medium hover:bg-brand-600 hover:shadow-lg hover:shadow-brand-500/30 transition-all duration-300 transform hover:-translate-y-0.5">{{ __('home.register') }}</a>
                @endauth

                <!-- Language Switcher -->
                <div class="relative group">
                    <select class="appearance-none bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 pl-4 pr-10 rounded-full border-none focus:ring-2 focus:ring-brand-500 transition-colors cursor-pointer text-sm" onchange="changeLanguage(this.value)">
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="si" {{ app()->getLocale() == 'si' ? 'selected' : '' }}>සිංහල</option>
                        <option value="ta" {{ app()->getLocale() == 'ta' ? 'selected' : '' }}>தமிழ்</option>
                    </select>
                    <svg class="w-4 h-4 text-gray-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="bg-brand-600 rounded-lg p-2 text-white border-none cursor-pointer flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500"
                        aria-label="Toggle navigation menu">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" style="display: none;" class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="mobileMenuOpen" style="display: none;" class="md:hidden bg-white border-t border-gray-100 shadow-xl pb-4">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <a href="{{ route('workers.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-gray-50">{{ __('home.find_workers') }}</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-gray-50">{{ __('home.about_us') }}</a>
            
            @auth
                @if(auth()->user()->role === 'worker')
                    <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-gray-50">{{ __('home.dashboard') }}</a>
                @endif
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-gray-50">{{ __('home.profile') }}</a>
                @else
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-gray-50">{{ __('home.profile') }}</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-bold text-red-600 hover:bg-red-50">
                        {{ __('home.logout') }}
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-600 hover:bg-gray-50">{{ __('home.login') }}</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-brand-600 hover:text-brand-700 hover:bg-brand-50">{{ __('home.register') }}</a>
            @endauth
            
            <!-- Mobile Language Switcher -->
            <div class="px-3 py-2 mt-2 border-t border-gray-100">
                <span class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Language:</span>
                <div class="flex gap-2">
                    <a href="?lang=en" class="px-3 py-1.5 text-xs font-black rounded-md {{ app()->getLocale() == 'en' ? 'bg-brand-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">EN</a>
                    <a href="?lang=si" class="px-3 py-1.5 text-xs font-black rounded-md {{ app()->getLocale() == 'si' ? 'bg-brand-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">සිං</a>
                    <a href="?lang=ta" class="px-3 py-1.5 text-xs font-black rounded-md {{ app()->getLocale() == 'ta' ? 'bg-brand-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">தமி</a>
                </div>
            </div>
        </div>
    </div>
</nav>

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
