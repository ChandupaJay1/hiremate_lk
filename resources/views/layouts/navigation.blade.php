<nav x-data="{ open: false }" style="background-color: white; border-bottom: 1px solid #e5e7eb; position: sticky; top: 0; z-index: 50;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="display: flex; justify-content: space-between; align-items: center; height: 64px;">

            <!-- LEFT: Logo + Desktop Nav Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center" style="margin-right: 32px;">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('images/fav_icon.png') }}" alt="HireMate LK Logo"
                             style="width: 40px; height: 40px; border-radius: 10px; object-fit: contain; margin-right: 10px; box-shadow: 0 4px 6px -1px rgba(13,148,136,0.2);">
                        <span style="font-size: 18px; font-weight: 800; color: #111827;">HireMate <span style="color: #0d9488;">LK</span></span>
                    </a>
                </div>

                <!-- Desktop Nav Links -->
                <div class="hidden sm:flex sm:space-x-8">
                    @if(auth()->check() && auth()->user()->role === 'worker')
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-teal-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-teal-600 transition"
                           style="height: 64px;">
                            {{ __('home.dashboard') }}
                        </a>
                    @endif
                    <a href="{{ route('workers.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('workers.*') ? 'border-teal-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-teal-600 transition"
                       style="height: 64px;">
                        {{ __('home.find_workers') }}
                    </a>
                    <a href="{{ route('about') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-teal-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-teal-600 transition"
                       style="height: 64px;">
                        {{ __('home.about_us') }}
                    </a>
                    @if(auth()->guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}"
                           class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-teal-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-teal-600 transition"
                           style="height: 64px;">
                            {{ __('home.admin_panel') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- RIGHT: Desktop Actions (hidden on mobile) -->
            <div class="hidden sm:flex sm:items-center" style="gap: 20px;">
                <!-- Contact Button -->
                <a href="{{ route('contact') }}"
                   style="background-color: #0d9488; color: white; padding: 8px 20px; border-radius: 999px; font-weight: 700; font-size: 12px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.2s;">
                    {{ __('home.contact_us') }}
                </a>

                @php
                    $admin = auth()->guard('admin')->user();
                    $user  = auth()->user();
                    $currentUser = $admin ?? $user;
                @endphp

                @if($currentUser)
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center p-1 rounded-xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                                <div style="width:40px; height:40px; border-radius:10px; background:#0d9488; display:flex; align-items:center; justify-content:center; color:white; font-size:14px; font-weight:900;">
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
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-red-600 font-bold">
                                    {{ __('home.logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-500 hover:text-teal-600 transition">{{ __('home.login') }}</a>
                        <a href="{{ route('register') }}"
                           style="background:#0d9488; color:white; padding:8px 18px; border-radius:8px; font-size:13px; font-weight:700;">
                            {{ __('home.register') }}
                        </a>
                    </div>
                @endif

                <!-- Language Selector -->
                <div style="display:flex; gap:4px; background:#f3f4f6; padding:4px; border-radius:8px; border:1px solid #e5e7eb;">
                    <a href="?lang=en" style="{{ app()->getLocale()=='en' ? 'background:#0d9488;color:white;box-shadow:0 1px 3px rgba(0,0,0,.15);' : 'color:#9ca3af;' }} padding:4px 10px; border-radius:6px; font-size:11px; font-weight:900;">EN</a>
                    <a href="?lang=si" style="{{ app()->getLocale()=='si' ? 'background:#0d9488;color:white;box-shadow:0 1px 3px rgba(0,0,0,.15);' : 'color:#9ca3af;' }} padding:4px 10px; border-radius:6px; font-size:11px; font-weight:900;">සිං</a>
                    <a href="?lang=ta" style="{{ app()->getLocale()=='ta' ? 'background:#0d9488;color:white;box-shadow:0 1px 3px rgba(0,0,0,.15);' : 'color:#9ca3af;' }} padding:4px 10px; border-radius:6px; font-size:11px; font-weight:900;">தமி</a>
                </div>
            </div>

            <!-- MOBILE: Hamburger — always on the right, teal colored so it's clearly visible -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        style="background-color: #0d9488; border-radius: 10px; padding: 8px; color: white; border: none; cursor: pointer; display:flex; align-items:center; justify-content:center;"
                        aria-label="Toggle navigation menu">
                    <!-- Hamburger icon (shown when closed) -->
                    <svg x-show="!open" style="width:24px; height:24px;" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!-- Close X icon (shown when open) -->
                    <svg x-show="open" x-cloak style="width:24px; height:24px;" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="open" x-cloak
         style="background: white; border-top: 1px solid #e5e7eb; box-shadow: 0 4px 16px rgba(0,0,0,0.08);"
         class="sm:hidden">

        <!-- Nav Links -->
        <div style="padding: 8px 0;">
            @if(auth()->check() && auth()->user()->role === 'worker')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('home.dashboard') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->guard('admin')->check())
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('home.admin_panel') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.profile.edit')" :active="request()->routeIs('admin.profile.edit')">
                    {{ __('home.profile') }}
                </x-responsive-nav-link>
            @elseif(auth()->check())
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('home.profile') }}
                </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="route('workers.index')" :active="request()->routeIs('workers.*')">
                {{ __('home.find_workers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('home.about_us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('home.contact_us') }}
            </x-responsive-nav-link>
        </div>

        <!-- Auth & Language section -->
        <div style="border-top: 1px solid #f3f4f6; padding: 12px 0 16px;">
            @if(auth()->guard('admin')->check() || auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <span style="color: #dc2626; font-weight: 700;">{{ __('home.logout') }}</span>
                    </x-responsive-nav-link>
                </form>
            @else
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('home.login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('home.register') }}
                </x-responsive-nav-link>
            @endif

            <!-- Language Selector -->
            <div style="padding: 12px 16px 0; display: flex; align-items: center; gap: 8px;">
                <span style="font-size: 11px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-right: 4px;">{{ __('home.language') ?? 'Language' }}:</span>
                <a href="?lang=en" style="{{ app()->getLocale()=='en' ? 'background:#0d9488;color:white;' : 'background:#f3f4f6;color:#6b7280;' }} padding:5px 12px; border-radius:6px; font-size:11px; font-weight:900;">EN</a>
                <a href="?lang=si" style="{{ app()->getLocale()=='si' ? 'background:#0d9488;color:white;' : 'background:#f3f4f6;color:#6b7280;' }} padding:5px 12px; border-radius:6px; font-size:11px; font-weight:900;">සිං</a>
                <a href="?lang=ta" style="{{ app()->getLocale()=='ta' ? 'background:#0d9488;color:white;' : 'background:#f3f4f6;color:#6b7280;' }} padding:5px 12px; border-radius:6px; font-size:11px; font-weight:900;">தமி</a>
            </div>
        </div>

    </div>
</nav>
