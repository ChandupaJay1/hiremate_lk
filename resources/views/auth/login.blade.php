<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 mt-12">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-heading font-bold text-2xl shadow-lg mb-6" style="background: linear-gradient(to bottom right, #0d9488, #10b981);">
            H
        </div>
        <h2 class="text-3xl font-heading font-black text-gray-900 tracking-tight">
            Welcome Back
        </h2>
        <p class="mt-2 text-sm text-gray-600 font-medium">
            Sign in to your HireMate LK account to continue
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Phone Number -->
        <div>
            <label for="login_id" class="block text-sm font-medium text-gray-700">{{ __('Phone Number') }}</label>
            <div class="mt-1">
                <input id="login_id" type="tel" name="login_id" value="{{ old('login_id') }}" required autofocus autocomplete="username" placeholder="07XXXXXXXX"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('login_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('auth.password') ?? 'Password' }}</label>
            <div class="mt-1">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-gray-300 rounded cursor-pointer">
                <label for="remember_me" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                    {{ __('auth.remember_me') ?? 'Remember me' }}
                </label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-brand-600 hover:text-brand-500 transition-colors">
                        {{ __('auth.forgot_password') ?? 'Forgot your password?' }}
                    </a>
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors">
                {{ __('auth.log_in') ?? 'Sign in' }}
            </button>
        </div>
        
        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">
                        Don't have an account?
                    </span>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="font-medium text-brand-600 hover:text-brand-500 transition-colors">
                    {{ __('auth.register') ?? 'Create an account' }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
