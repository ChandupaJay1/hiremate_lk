<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold">Ayubowan, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-600">Welcome to your HireMate LK dashboard.</p>
                </div>
            </div>

            @if(auth()->user()->role === 'customer')
                <!-- Customer Dashboard -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 shadow-sm rounded-lg border border-gray-100">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <h4 class="font-bold">Find Workers</h4>
                        </div>
                        <p class="text-sm text-gray-500 mb-4">Browse verified professionals in your area.</p>
                        <a href="{{ route('workers.index') }}" class="text-blue-600 font-bold text-sm hover:underline">Browse Directory →</a>
                    </div>

                    <div class="bg-white p-6 shadow-sm rounded-lg border border-gray-100 opacity-60">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-green-100 text-green-600 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </div>
                            <h4 class="font-bold">My Projects</h4>
                        </div>
                        <p class="text-sm text-gray-500">Track your active bookings.</p>
                    </div>

                    <div class="bg-white p-6 shadow-sm rounded-lg border border-gray-100 opacity-60">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-purple-100 text-purple-600 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <h4 class="font-bold">Messages</h4>
                        </div>
                        <p class="text-sm text-gray-500">Chat with workers.</p>
                    </div>
                </div>
            @else
                <!-- Worker Dashboard -->
                @php
                    $user   = auth()->user();
                    $fields = ['name', 'phone_number', 'job_name', 'district', 'province'];
                    $filled = collect($fields)->filter(fn($f) => !empty($user->$f))->count();
                    $total  = count($fields);
                    $percent = (int) round(($filled / $total) * 100);
                @endphp

                <!-- Stats Row -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white p-4 shadow-sm rounded-lg border border-gray-100">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Strength</p>
                        <p class="text-2xl font-black text-brand-600">{{ $percent }}%</p>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded-lg border border-gray-100">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Views</p>
                        <p class="text-2xl font-black text-gray-900">24</p>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded-lg border border-gray-100">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Jobs</p>
                        <p class="text-2xl font-black text-gray-900">0</p>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded-lg border border-gray-100">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Rating</p>
                        <p class="text-2xl font-black text-gray-900">--</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Profile Card -->
                    <div class="lg:col-span-2">
                        <div class="bg-white shadow-sm rounded-lg border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                                <h4 class="font-bold">My Profile Summary</h4>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-6 mb-8">
                                    <div class="w-20 h-20 bg-brand-500 text-white rounded-full flex items-center justify-center text-3xl font-bold">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h5 class="text-xl font-bold">{{ $user->name }}</h5>
                                        <p class="text-gray-500">{{ $user->job_name ?? 'Not Set' }}</p>
                                        <p class="text-sm text-gray-400">{{ $user->district ?? 'Sri Lanka' }}</p>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between text-sm mb-1">
                                            <span class="font-medium text-gray-600">Profile Completion</span>
                                            <span class="font-bold text-brand-600">{{ $percent }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2">
                                            <div class="bg-brand-500 h-2 rounded-full" style="width: {{ $percent }}%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex gap-4 pt-4">
                                        <a href="{{ route('workers.show', $user) }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md font-bold text-sm transition-colors">
                                            View Public Profile
                                        </a>
                                        <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-md font-bold text-sm transition-colors">
                                            Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Side Column -->
                    <div class="space-y-6">
                        <div class="bg-white p-6 shadow-sm rounded-lg border border-gray-100">
                            <h4 class="font-bold mb-4">Quick Actions</h4>
                            <div class="space-y-2">
                                <button class="w-full text-left p-3 rounded-md hover:bg-gray-50 text-gray-400 cursor-not-allowed flex items-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    Find Work
                                </button>
                                <button class="w-full text-left p-3 rounded-md hover:bg-gray-50 text-gray-400 cursor-not-allowed flex items-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path></svg>
                                    Earnings
                                </button>
                            </div>
                        </div>

                        <div class="bg-amber-50 p-6 shadow-sm rounded-lg border border-amber-100">
                            <h4 class="font-bold text-amber-900 mb-2">Tip: Get Noticed</h4>
                            <p class="text-sm text-amber-800">Profiles with a district and province appear in local searches more often.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
