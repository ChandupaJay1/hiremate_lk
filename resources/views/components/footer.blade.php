<footer style="background-color: #111827; color: white; padding-top: 60px; padding-bottom: 40px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10" style="border-bottom: 1px solid #374151; padding-bottom: 40px;">
            <!-- Brand -->
            <div>
                <div class="flex items-center mb-8" style="gap: 20px;">
                    <img src="{{ asset('images/fav_icon.png') }}" alt="HireMate LK Logo" style="width: 44px; height: 44px; border-radius: 12px; object-fit: contain; flex-shrink: 0;">
                    <span style="font-size: 24px; font-weight: 800; color: white; white-space: nowrap;">HireMate <span style="color: #0d9488;">LK</span></span>
                </div>
                <p style="color: #9ca3af; font-size: 14px; line-height: 1.6;">
                    {{ __('home.footer_about_text') }}
                </p>
            </div>

            <!-- Links -->
            <div>
                <h4 style="font-weight: 800; margin-bottom: 24px; color: #0d9488; font-size: 14px; text-transform: uppercase; tracking: 0.1em;">{{ __('home.footer_platform') }}</h4>
                <ul class="space-y-4" style="font-size: 14px; color: #d1d5db;">
                    <li><a href="{{ route('workers.index') }}" class="hover:text-white transition">{{ __('home.find_workers') }}</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">{{ __('home.about_us') }}</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">{{ __('home.footer_join') }}</a></li>
                    <li><a href="#" class="hover:text-white transition">{{ __('home.footer_how') }}</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 style="font-weight: 800; margin-bottom: 24px; color: #0d9488; font-size: 14px; text-transform: uppercase; tracking: 0.1em;">{{ __('home.footer_support') }}</h4>
                <ul class="space-y-4" style="font-size: 14px; color: #d1d5db;">
                    <li>Email: {{ env('CONTACT_EMAIL', 'support@hiremate.lk') }}</li>
                    <li>Phone: {{ env('CONTACT_PHONE', '+94 11 234 5678') }}</li>
                </ul>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4" style="font-size: 12px; color: #6b7280; font-weight: 700; text-transform: uppercase; tracking: 0.1em;">
            <p>&copy; {{ date('Y') }} HireMate LK. {{ __('home.footer_rights') }}</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('contact') }}" class="bg-brand-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-brand-600 transition-colors text-sm">
                    {{ __('home.footer_contact') }}
                </a>
                <a href="#" class="hover:text-white transition">{{ __('home.footer_privacy') }}</a>
                <a href="#" class="hover:text-white transition">{{ __('home.footer_terms') }}</a>
            </div>
        </div>
    </div>
</footer>
