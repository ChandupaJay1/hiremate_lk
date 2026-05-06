<x-frontend-layout title="{{ __('home.contact_us') }} - HireMate LK">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-heading font-black text-gray-900 mb-4 tracking-tight">{{ __('home.contact_title') }}</h1>
            <p class="text-xl text-gray-500 font-medium max-w-2xl mx-auto">{{ __('home.contact_subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Form -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h2 class="text-2xl font-heading font-bold text-gray-900 mb-6">{{ __('home.contact_send_msg') }}</h2>
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                        {{ __('home.contact_success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('home.contact_full_name') }}</label>
                        <input type="text" id="name" name="name" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('home.contact_email') }}</label>
                        <input type="email" id="email" name="email" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">{{ __('home.contact_subject') }}</label>
                        <input type="text" id="subject" name="subject" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('home.contact_message') }}</label>
                        <textarea id="message" name="message" rows="6" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-brand-500 text-white px-8 py-4 rounded-xl font-semibold hover:bg-brand-600 transition-colors shadow-lg shadow-brand-500/30">
                        {{ __('home.contact_send_btn') }}
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-heading font-bold text-gray-900 mb-6">{{ __('home.contact_get_in_touch') }}</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('home.contact_email') }}</h3>
                                <p class="text-gray-600">{{ env('CONTACT_EMAIL', 'support@hiremate.lk') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('home.phone') }}</h3>
                                <p class="text-gray-600">{{ env('CONTACT_PHONE', '+94 11 234 5678') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brand-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('home.contact_location') }}</h3>
                                <p class="text-gray-600">{{ env('CONTACT_ADDRESS', 'Colombo, Sri Lanka') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-brand-50 rounded-3xl p-8">
                    <h3 class="text-xl font-heading font-bold text-gray-900 mb-4">{{ __('home.contact_why_title') }}</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ __('home.contact_verified') }}
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ __('home.contact_booking') }}
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ __('home.contact_support') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>