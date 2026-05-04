<x-frontend-layout title="{{ $worker->name }} - Worker Profile | HireMate LK">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center mb-8 text-sm text-gray-500 font-bold uppercase tracking-widest">
            <a href="{{ url('/') }}" class="flex items-center gap-1.5 hover:text-teal-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Home
            </a>
            <span class="mx-3 text-gray-300">/</span>
            <a href="{{ route('workers.index') }}" class="hover:text-teal-600 transition-colors">Workers</a>
            <span class="mx-3 text-gray-300">/</span>
            <span class="text-teal-600">{{ $worker->name }}</span>
        </nav>

        <div class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-xl shadow-gray-200/40">
            <!-- Profile Header Cover -->
            <div class="h-48 relative" style="background: linear-gradient(to right, #0f766e, #0d9488, #10b981);">
                <div class="absolute inset-0 bg-black/5"></div>
                <!-- Back Button -->
                <a href="{{ route('workers.index') }}" class="absolute top-6 left-6 flex items-center gap-2 px-4 py-2 rounded-full text-white text-xs font-bold uppercase tracking-widest transition-all hover:-translate-x-1" style="background-color: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back
                </a>
            </div>

            <!-- Profile Content -->
            <div class="px-8 pb-12 relative">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 -mt-20 mb-8">
                    <!-- Avatar and Basic Info -->
                    <div class="flex flex-col md:flex-row md:items-end gap-6">
                        <div class="w-40 h-40 bg-white p-2 rounded-3xl shadow-lg relative z-10">
                            <div class="w-full h-full rounded-2xl flex items-center justify-center font-heading font-bold text-5xl" style="background: linear-gradient(to bottom right, #f0fdfa, #ccfbf1); color: #0d9488;">
                                {{ strtoupper(substr($worker->name, 0, 1)) }}
                            </div>
                            <!-- Verified Badge -->
                            <div class="absolute -top-3 -right-3 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white" style="background-color: #0d9488;">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pb-2">
                            <h1 class="text-4xl md:text-5xl font-heading font-black text-gray-900 mb-2 tracking-tight">
                                {{ $worker->name }}
                            </h1>
                            <div class="flex items-center gap-3 text-gray-600">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium" style="background-color: #f0fdfa; color: #0f766e;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    {{ $worker->job_name ?? 'Professional Worker' }}
                                </span>
                                <span class="flex items-center gap-1 text-sm">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    @if($worker->district && $worker->province)
                                        {{ $worker->district }}, {{ $worker->province }} Province
                                    @elseif($worker->province)
                                        {{ $worker->province }} Province, Sri Lanka
                                    @else
                                        Sri Lanka
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="md:pb-2">
                        @if($worker->phone_number)
                            <a href="tel:{{ $worker->phone_number }}" class="inline-flex items-center justify-center gap-3 text-white rounded-2xl font-black text-lg uppercase tracking-widest transition-all duration-300 shadow-xl hover:-translate-y-1 active:scale-95 group" style="background: linear-gradient(to right, #0d9488, #10b981); box-shadow: 0 20px 25px -5px rgba(13, 148, 136, 0.3); white-space: nowrap; min-width: 200px; padding: 18px 24px;">
                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                Contact Now
                            </a>
                        @else
                            <button disabled class="inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-400 px-10 py-5 rounded-2xl font-bold w-full md:w-auto cursor-not-allowed border border-gray-200 uppercase tracking-widest text-sm">
                                Contact Unavailable
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
                    <!-- About Section -->
                    <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100">
                        <h3 class="text-lg font-heading font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            About {{ explode(' ', trim($worker->name))[0] }}
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $worker->name }} is a registered professional on HireMate LK specializing as a {{ $worker->job_name ?? 'worker' }}. They have been verified by our platform and are available for new projects.
                        </p>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100">
                        <h3 class="text-lg font-heading font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            Contact Information
                        </h3>
                        
                        <ul class="space-y-4">
                            @if($worker->phone_number)
                                <li class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-gray-400 shadow-sm border border-gray-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Phone Number</p>
                                        <p class="text-gray-900 font-medium">{{ $worker->phone_number }}</p>
                                    </div>
                                </li>
                            @endif

                            @if($worker->district)
                                <li class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-gray-400 shadow-sm border border-gray-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">District</p>
                                        <p class="text-gray-900 font-medium">{{ $worker->district }}</p>
                                    </div>
                                </li>
                            @endif

                            @if($worker->province)
                                <li class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-gray-400 shadow-sm border border-gray-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Province</p>
                                        <p class="text-gray-900 font-medium">{{ $worker->province }} Province</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- Safety Banner -->
        <div class="mt-8 bg-amber-50 rounded-2xl p-6 border border-amber-100 flex items-start gap-4">
            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <h4 class="text-amber-800 font-semibold mb-1">Safety First</h4>
                <p class="text-amber-700 text-sm leading-relaxed">Always verify the worker's identity upon arrival. Discuss all project details and pricing before work begins. For your safety, we recommend communicating through the platform when possible.</p>
            </div>
        </div>

    </div>
</x-frontend-layout>
