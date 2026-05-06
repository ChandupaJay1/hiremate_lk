<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 mt-12">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-heading font-bold text-2xl shadow-lg mb-6" style="background: linear-gradient(to bottom right, #0d9488, #10b981);">
            H
        </div>
        <h2 class="text-3xl font-heading font-black text-gray-900 tracking-tight">
            Forgot Password?
        </h2>
        <p class="mt-2 text-sm text-gray-600 font-medium">
            No problem. Enter your registered phone number below and we will help you reset your password.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Phone Number -->
        <div>
            <label for="login_id" class="block text-sm font-medium text-gray-700">{{ __('Phone Number') }}</label>
            <div class="mt-1">
                <input id="login_id" type="tel" name="login_id" value="{{ old('login_id') }}" required autofocus placeholder="07XXXXXXXX"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('login_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" class="text-sm font-medium text-brand-600 hover:text-brand-500 transition-colors">
                Back to Login
            </a>
            <button type="submit" class="flex justify-center py-3 px-6 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>
