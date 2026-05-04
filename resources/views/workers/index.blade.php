<x-frontend-layout title="Find Workers - HireMate LK">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl md:text-6xl font-heading font-black text-gray-900 mb-4 tracking-tight">Find Professionals</h1>
                <p class="text-xl text-gray-500 font-medium">Browse verified experts ready for your project.</p>
            </div>
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-200 text-gray-600 font-bold uppercase tracking-widest text-sm rounded-xl hover:bg-gray-50 hover:text-teal-600 hover:border-teal-100 transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Back to Home
            </a>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 mb-12">
            <form method="GET" action="{{ route('workers.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-grow">
                    <label for="search" class="sr-only">Search by name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="block w-full pl-11 pr-3 py-4 border border-gray-200 rounded-2xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors" placeholder="Search workers by name...">
                    </div>
                </div>
                
                <div class="md:w-64">
                    <label for="job" class="sr-only">Filter by job</label>
                    <div class="relative group">
                        <select name="job" id="job" class="appearance-none block w-full pl-4 pr-10 py-4 border border-gray-200 rounded-2xl bg-gray-50 text-gray-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors cursor-pointer">
                            <option value="">All Categories</option>
                            @foreach($jobs as $jobCategory)
                                <option value="{{ $jobCategory }}" {{ request('job') == $jobCategory ? 'selected' : '' }}>
                                    {{ $jobCategory }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="md:w-48">
                    <label for="district" class="sr-only">Filter by district</label>
                    <div class="relative group">
                        <select name="district" id="district" class="appearance-none block w-full pl-4 pr-10 py-4 border border-gray-200 rounded-2xl bg-gray-50 text-gray-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors cursor-pointer">
                            <option value="">All Districts</option>
                            @foreach($districts as $districtName)
                                <option value="{{ $districtName }}" {{ request('district') == $districtName ? 'selected' : '' }}>
                                    {{ $districtName }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <button type="submit" class="bg-brand-500 text-white px-8 py-4 rounded-2xl font-semibold hover:bg-brand-600 transition-colors shadow-lg shadow-brand-500/30">
                    Search
                </button>
                @if(request()->has('search') || request()->has('job') || request()->has('district'))
                    <a href="{{ route('workers.index') }}" class="px-8 py-4 text-gray-500 hover:text-gray-700 font-medium rounded-2xl border border-gray-200 hover:bg-gray-50 transition-colors flex items-center justify-center">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Workers Grid -->
        @if($workers->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($workers as $worker)
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-gray-200/50 hover:-translate-y-1 transition-all duration-300 group flex flex-col h-full">
                        <div class="p-8 flex-grow flex flex-col items-center text-center">
                            <!-- Avatar -->
                            <div class="w-24 h-24 bg-gradient-to-br from-brand-100 to-brand-50 rounded-full flex items-center justify-center text-brand-600 font-heading font-bold text-3xl mb-4 group-hover:scale-110 transition-transform duration-300 border-4 border-white shadow-md">
                                {{ strtoupper(substr($worker->name, 0, 1)) }}
                            </div>
                            
                            <h3 class="text-xl font-heading font-bold text-gray-900 mb-1">{{ $worker->name }}</h3>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600 mb-2">
                                {{ $worker->job_name ?? 'Professional Worker' }}
                            </span>
                            @if($worker->district)
                                <div class="flex items-center justify-center gap-2 px-4 py-1.5 bg-gray-50 rounded-full border border-gray-100 mb-4">
                                    <svg style="width: 14px; height: 14px; color: #6b7280;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span style="font-size: 13px; font-weight: 600; color: #4b5563;">
                                        {{ $worker->district }}{{ $worker->province ? ', ' . $worker->province : '' }}
                                    </span>
                                </div>
                            @else
                                <div class="mb-4 h-[32px]"></div>
                            @endif
                        </div>
                        
                        <div class="p-4 border-t border-gray-50 bg-gray-50/50 mt-auto">
                            <a href="{{ route('workers.show', $worker) }}" class="block w-full py-3 px-4 bg-white border border-gray-200 text-center text-gray-700 font-semibold rounded-xl hover:bg-brand-500 hover:text-white hover:border-brand-500 transition-colors duration-300">
                                View Profile
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $workers->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-24 bg-white rounded-3xl border border-gray-100">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-heading font-bold text-gray-900 mb-2">No workers found</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">We couldn't find any workers matching your current search criteria. Try adjusting your filters.</p>
                <a href="{{ route('workers.index') }}" class="inline-block px-6 py-3 bg-brand-50 text-brand-600 font-semibold rounded-full hover:bg-brand-100 transition-colors">
                    Clear all filters
                </a>
            </div>
        @endif
    </div>
</x-frontend-layout>
