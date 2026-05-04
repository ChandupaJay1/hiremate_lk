<nav class="fixed w-full z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-gray-200" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white font-heading font-bold text-xl shadow-lg">
                        H
                    </div>
                    <h1 class="text-2xl font-heading font-bold bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600">HireMate LK</h1>
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <!-- Navigation Links -->
                <a href="{{ route('workers.index') }}" class="text-gray-600 hover:text-brand-600 font-medium transition-colors">Find Workers</a>

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
