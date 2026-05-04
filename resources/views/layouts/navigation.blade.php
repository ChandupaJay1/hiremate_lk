<nav x-data="{ open: false }" style="background-color: white; border-bottom: 1px solid #e5e7eb; position: sticky; top: 0; z-index: 50;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center" style="height: 64px;">
            
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center" style="margin-right: 60px;">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background-color: #0d9488; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 20px; box-shadow: 0 4px 6px -1px rgba(13, 148, 136, 0.2); margin-right: 15px;">
                            <span style="width: 100%; text-align: center;">H</span>
                        </div>
                        <div class="hidden md:block">
                            <span style="font-size: 20px; font-weight: 800; color: #111827;">HireMate<span style="color: #0d9488;">.LK</span></span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-16">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-brand-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-brand-600 transition" style="height: 64px;">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('workers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('workers.*') ? 'border-brand-600 text-gray-900' : 'border-transparent text-gray-500' }} text-sm font-bold uppercase tracking-wide hover:text-brand-600 transition" style="height: 64px;">
                        {{ __('Find Workers') }}
                    </a>
                </div>
            </div>

            <!-- Right Actions -->
            <div class="hidden sm:flex sm:items-center" style="gap: 50px;">
                <!-- Contact Button -->
                <a href="{{ route('contact') }}" class="bg-brand-600 text-white px-5 py-2.5 rounded-full font-bold hover:bg-brand-700 hover:shadow-lg hover:shadow-brand-500/20 transition-all duration-300 transform hover:-translate-y-0.5 text-xs uppercase tracking-wider">
                    Contact Us
                </a>

                <!-- Language Selector -->
                <div class="flex items-center gap-1 bg-gray-100/50 p-1 rounded-lg border border-gray-200/50">
                    <a href="?lang=en" class="px-3 py-1.5 text-[11px] font-black rounded-md {{ app()->getLocale() == 'en' ? 'bg-brand-600 text-white shadow-md' : 'text-gray-400 hover:text-gray-600 transition-colors' }}">EN</a>
                    <a href="?lang=si" class="px-3 py-1.5 text-[11px] font-black rounded-md {{ app()->getLocale() == 'si' ? 'bg-brand-600 text-white shadow-md' : 'text-gray-400 hover:text-gray-600 transition-colors' }}">සිං</a>
                    <a href="?lang=ta" class="px-3 py-1.5 text-[11px] font-black rounded-md {{ app()->getLocale() == 'ta' ? 'bg-brand-600 text-white shadow-md' : 'text-gray-400 hover:text-gray-600 transition-colors' }}">தமி</a>
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-bold text-gray-600 hover:text-gray-900 transition" style="gap: 8px;">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile Settings</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-bold">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('workers.index')" :active="request()->routeIs('workers.*')">Find Workers</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">Contact Us</x-responsive-nav-link>
        </div>
    </div>
</nav>
