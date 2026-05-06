<nav x-data="{ open: false }" style="background-color: white; border-bottom: 1px solid #e5e7eb; position: sticky; top: 0; z-index: 50;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center" style="height: 64px;">
            
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center" style="margin-right: 60px;">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('images/fav_icon.png') }}" alt="HireMate LK Logo" style="width: 44px; height: 44px; border-radius: 12px; object-fit: contain; margin-right: 15px; box-shadow: 0 4px 6px -1px rgba(13, 148, 136, 0.2);">
                        <div class="hidden md:block">
                            <span style="font-size: 20px; font-weight: 800; color: #111827;">HireMate <span style="color: #0d9488;">LK</span></span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-16">
                    @if(auth()->check() && auth()->user()->role === 'worker')
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-brand-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-brand-600 transition" style="height: 64px;">
                            {{ __('home.dashboard') }}
                        </a>
                    @endif
                    <a href="{{ route('workers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('workers.*') ? 'border-brand-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-brand-600 transition" style="height: 64px;">
                        {{ __('home.find_workers') }}
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-brand-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-brand-600 transition" style="height: 64px;">
                        {{ __('home.about_us') }}
                    </a>
                    @if(auth()->guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-brand-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-brand-600 transition" style="height: 64px;">
                            {{ __('home.admin_panel') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Right Actions -->
            <div class="hidden sm:flex sm:items-center" style="gap: 50px;">
                <!-- Contact Button -->
                <a href="{{ route('contact') }}" class="bg-brand-600 text-white px-5 py-2.5 rounded-full font-bold hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-500/20 transition-all duration-300 transform hover:-translate-y-0.5 text-xs uppercase tracking-wider">
                    {{ __('home.contact_us') }}
                </a>



                @php
                    $admin = auth()->guard('admin')->user();
                    $user = auth()->user();
                    $currentUser = $admin ?? $user;
                @endphp

                @if($currentUser)
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center p-1 rounded-xl hover:bg-gray-50 transition-all duration-200 group border border-transparent hover:border-gray-100">
                                <div class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white text-sm font-black shadow-sm group-hover:shadow-md transition-all ring-4 ring-transparent group-hover:ring-brand-50">
                                    {{ strtoupper(substr($currentUser->name, 0, 1)) }}
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(auth()->guard('admin')->check())
                                <x-dropdown-link :href="route('admin.profile.edit')">{{ __('home.profile') }}</x-dropdown-link>
                            @else
                                <x-dropdown-link :href="route('profile.edit')">{{ __('home.profile') }}</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-bold">{{ __('home.logout') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-500 hover:text-brand-600 transition">{{ __('home.login') }}</a>
                        <a href="{{ route('register') }}" class="bg-brand-600 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-brand-700 transition shadow-sm">{{ __('home.register') }}</a>
                    </div>
                @endif

                <!-- Language Selector -->
                <div class="flex items-center gap-1 bg-gray-100/50 p-1 rounded-lg border border-gray-200/50">
                    <a href="?lang=en" class="px-3 py-1.5 text-[11px] font-black rounded-md {{ app()->getLocale() == 'en' ? 'bg-brand-600 text-white shadow-md' : 'text-gray-400 hover:text-gray-600 transition-colors' }}">EN</a>
                    <a href="?lang=si" class="px-3 py-1.5 text-[11px] font-black rounded-md {{ app()->getLocale() == 'si' ? 'bg-brand-600 text-white shadow-md' : 'text-gray-400 hover:text-gray-600 transition-colors' }}">සිං</a>
                    <a href="?lang=ta" class="px-3 py-1.5 text-[11px] font-black rounded-md {{ app()->getLocale() == 'ta' ? 'bg-brand-600 text-white shadow-md' : 'text-gray-400 hover:text-gray-600 transition-colors' }}">தமி</a>
                </div>
            </div>

            <!-- Mobile Toggle -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 text-gray-400 hover:bg-gray-100 rounded-md">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-3 pb-4 space-y-2">
            @if(auth()->check() && auth()->user()->role === 'worker')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('home.dashboard') }}</x-responsive-nav-link>
            @endif
            @if(auth()->guard('admin')->check())
                <x-responsive-nav-link :href="route('admin.profile.edit')" :active="request()->routeIs('admin.profile.edit')">{{ __('home.profile') }}</x-responsive-nav-link>
            @elseif(auth()->check() && auth()->user()->role === 'customer')
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">{{ __('home.profile') }}</x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('workers.index')" :active="request()->routeIs('workers.*')">{{ __('home.find_workers') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">{{ __('home.about_us') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">{{ __('home.contact_us') }}</x-responsive-nav-link>
        </div>
    </div>
</nav>
