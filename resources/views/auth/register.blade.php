<x-guest-layout>
    <!-- Header -->
    <div class="mb-6">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-brand-500 to-brand-600 flex items-center justify-center text-white font-heading font-bold text-2xl shadow-lg mb-6">
            H
        </div>
        <h2 class="text-3xl font-heading font-bold text-gray-900">
            Join HireMate LK
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Connect with skilled workers or find work opportunities
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Role Selection -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">
                {{ __('auth.i_am_a') ?? 'I am a...' }}
            </label>
            <div class="grid grid-cols-2 gap-4">
                <label class="relative group cursor-pointer">
                    <input type="radio" name="role" value="customer" class="peer sr-only" required {{ old('role') === 'customer' ? 'checked' : '' }}>
                    <div class="p-4 border-2 border-gray-200 rounded-xl hover:border-brand-300 peer-checked:border-brand-500 peer-checked:bg-brand-50 transition-all text-center">
                        <div class="w-10 h-10 mx-auto bg-brand-100 text-brand-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform peer-checked:bg-brand-500 peer-checked:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="block font-semibold text-gray-900">{{ __('auth.customer') ?? 'Customer' }}</span>
                        <span class="block text-xs text-gray-500 mt-1">Hire workers</span>
                    </div>
                </label>
                <label class="relative group cursor-pointer">
                    <input type="radio" name="role" value="worker" class="peer sr-only" {{ old('role') === 'worker' ? 'checked' : '' }}>
                    <div class="p-4 border-2 border-gray-200 rounded-xl hover:border-amber-300 peer-checked:border-amber-500 peer-checked:bg-amber-50 transition-all text-center">
                        <div class="w-10 h-10 mx-auto bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform peer-checked:bg-amber-500 peer-checked:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="block font-semibold text-gray-900">{{ __('auth.worker') ?? 'Worker' }}</span>
                        <span class="block text-xs text-gray-500 mt-1">Find jobs</span>
                    </div>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('auth.name') ?? 'Full Name' }}</label>
            <div class="mt-1">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Job Name (Only for Workers) -->
        <div id="job_name_container" style="display: none;">
            <label for="job_name" class="block text-sm font-medium text-gray-700">Job Name</label>
            <div class="mt-1">
                <select id="job_name" name="job_name" class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
                    <option value="" disabled selected>Select your profession</option>
                    <option value="Mason" {{ old('job_name') == 'Mason' ? 'selected' : '' }}>Mason</option>
                    <option value="Electrician" {{ old('job_name') == 'Electrician' ? 'selected' : '' }}>Electrician</option>
                    <option value="Plumber" {{ old('job_name') == 'Plumber' ? 'selected' : '' }}>Plumber</option>
                    <option value="Carpenter" {{ old('job_name') == 'Carpenter' ? 'selected' : '' }}>Carpenter</option>
                    <option value="Painter" {{ old('job_name') == 'Painter' ? 'selected' : '' }}>Painter</option>
                    <option value="Cleaner" {{ old('job_name') == 'Cleaner' ? 'selected' : '' }}>Cleaner</option>
                    <option value="Other" {{ old('job_name') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <x-input-error :messages="$errors->get('job_name')" class="mt-2" />
        </div>

        <!-- Email Address (Customers) -->
        <div id="email_container">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('auth.email') ?? 'Email Address' }}</label>
            <div class="mt-1">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number (Workers) -->
        <div id="phone_container" style="display: none;">
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <div class="mt-1">
                <input id="phone_number" type="tel" name="phone_number" value="{{ old('phone_number') }}" autocomplete="tel" placeholder="07XXXXXXXX"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('auth.password') ?? 'Password' }}</label>
            <div class="mt-1">
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('auth.confirm_password') ?? 'Confirm Password' }}</label>
            <div class="mt-1">
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors">
                {{ __('auth.register') ?? 'Create Account' }}
            </button>
        </div>
        
        <div class="mt-4 text-center">
            <span class="text-sm text-gray-500">Already have an account?</span>
            <a href="{{ route('login') }}" class="text-sm font-medium text-brand-600 hover:text-brand-500 transition-colors ml-1">
                {{ __('auth.already_registered') ?? 'Sign in here' }}
            </a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleRadios = document.querySelectorAll('input[name="role"]');
            const jobNameContainer = document.getElementById('job_name_container');
            const jobNameSelect = document.getElementById('job_name');
            const emailContainer = document.getElementById('email_container');
            const emailInput = document.getElementById('email');
            const phoneContainer = document.getElementById('phone_container');
            const phoneInput = document.getElementById('phone_number');

            function toggleRoleFields() {
                const selectedRole = document.querySelector('input[name="role"]:checked')?.value;
                if (selectedRole === 'worker') {
                    // Show Worker fields
                    jobNameContainer.style.display = 'block';
                    jobNameSelect.setAttribute('required', 'required');
                    phoneContainer.style.display = 'block';
                    phoneInput.setAttribute('required', 'required');
                    
                    // Hide Customer fields
                    emailContainer.style.display = 'none';
                    emailInput.removeAttribute('required');
                    emailInput.value = ''; 
                } else {
                    // Show Customer fields
                    emailContainer.style.display = 'block';
                    emailInput.setAttribute('required', 'required');
                    
                    // Hide Worker fields
                    jobNameContainer.style.display = 'none';
                    jobNameSelect.removeAttribute('required');
                    jobNameSelect.value = ''; 
                    phoneContainer.style.display = 'none';
                    phoneInput.removeAttribute('required');
                    phoneInput.value = '';
                }
            }

            roleRadios.forEach(radio => {
                radio.addEventListener('change', toggleRoleFields);
            });

            // Initial check on load (for validation errors / old input)
            toggleRoleFields();
        });
    </script>
</x-guest-layout>
