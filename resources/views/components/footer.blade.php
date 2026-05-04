<footer style="background-color: #111827; color: white; padding-top: 60px; padding-bottom: 40px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10" style="border-bottom: 1px solid #374151; padding-bottom: 40px;">
            <!-- Brand -->
            <div>
                <div class="flex items-center mb-8" style="gap: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background-color: #0d9488; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 20px; shrink: 0;">
                        H
                    </div>
                    <span style="font-size: 24px; font-weight: 800; color: white; white-space: nowrap;">HireMate<span style="color: #0d9488;">.LK</span></span>
                </div>
                <p style="color: #9ca3af; font-size: 14px; line-height: 1.6;">
                    Sri Lanka's trusted platform for finding skilled professionals for your home and business.
                </p>
            </div>

            <!-- Links -->
            <div>
                <h4 style="font-weight: 800; margin-bottom: 24px; color: #0d9488; font-size: 14px; text-transform: uppercase; tracking: 0.1em;">Platform</h4>
                <ul class="space-y-4" style="font-size: 14px; color: #d1d5db;">
                    <li><a href="{{ route('workers.index') }}" class="hover:text-white transition">Find Workers</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">Join as a Worker</a></li>
                    <li><a href="#" class="hover:text-white transition">How it works</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 style="font-weight: 800; margin-bottom: 24px; color: #0d9488; font-size: 14px; text-transform: uppercase; tracking: 0.1em;">Support</h4>
                <ul class="space-y-4" style="font-size: 14px; color: #d1d5db;">
                    <li>Email: support@hiremate.lk</li>
                    <li>Phone: +94 11 234 5678</li>
                </ul>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4" style="font-size: 12px; color: #6b7280; font-weight: 700; text-transform: uppercase; tracking: 0.1em;">
            <p>&copy; {{ date('Y') }} HireMate LK. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('contact') }}" class="bg-brand-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-brand-600 transition-colors text-sm">
                    Contact Us
                </a>
                <a href="#" class="hover:text-white transition">Privacy</a>
                <a href="#" class="hover:text-white transition">Terms</a>
            </div>
        </div>
    </div>
</footer>
