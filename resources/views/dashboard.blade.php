<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(auth()->user()->role === 'customer')
                        <!-- Customer Dashboard -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                            <p class="text-gray-600 mb-4">Find skilled workers for your home and business needs.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Find Workers</h4>
                                        <p class="text-sm text-gray-600">Browse available workers by category</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-green-50 p-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">My Projects</h4>
                                        <p class="text-sm text-gray-600">View your ongoing and completed projects</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-purple-50 p-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Messages</h4>
                                        <p class="text-sm text-gray-600">Communicate with workers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Worker Dashboard -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Welcome back, {{ auth()->user()->name }}!</h3>
                            <p class="text-gray-600 mb-4">Manage your services and connect with customers.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Available Jobs</h4>
                                        <p class="text-sm text-gray-600">Browse job opportunities in your area</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-green-50 p-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">My Services</h4>
                                        <p class="text-sm text-gray-600">Manage your offered services</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-purple-50 p-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Earnings</h4>
                                        <p class="text-sm text-gray-600">Track your income and payments</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
