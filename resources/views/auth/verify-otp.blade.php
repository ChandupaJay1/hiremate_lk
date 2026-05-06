<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 mt-12">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-heading font-bold text-2xl shadow-lg mb-6" style="background: linear-gradient(to bottom right, #0d9488, #10b981);">
            H
        </div>
        <h2 class="text-3xl font-heading font-black text-gray-900 tracking-tight">
            Verify OTP
        </h2>
        <p class="mt-2 text-sm text-gray-600 font-medium">
            Enter the 4-digit code sent to {{ session('reset_phone_number') }} and choose your new password.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- OTP -->
        <div>
            <label for="otp" class="block text-sm font-medium text-gray-700">4-Digit OTP</label>
            <div class="mt-1">
                <input id="otp" type="text" name="otp" required autofocus placeholder="1234" maxlength="4"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors text-center tracking-widest font-bold">
            </div>
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <div class="mt-1">
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <div class="mt-1">
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-brand-600 hover:text-brand-500 transition-colors">
                Resend Code
            </a>
            <button type="submit" class="flex justify-center py-3 px-6 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors">
                Reset Password
            </button>
        </div>
    </form>
</x-guest-layout>
