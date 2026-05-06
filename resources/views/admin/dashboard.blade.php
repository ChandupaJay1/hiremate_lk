<x-app-layout>
    <div class="py-8 bg-gray-50/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Admin Header -->
            <div class="mb-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-black text-gray-900 tracking-tight">Admin Control Center</h1>
                        <p class="text-gray-500 font-medium">Platform overview and management dashboard.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="px-4 py-2 bg-brand-50 text-brand-600 rounded-full text-sm font-bold border border-brand-100 shadow-sm">
                            System Status: Online
                        </span>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-brand-50 text-brand-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Total Users</span>
                    </div>
                    <p class="text-3xl font-black text-gray-900">{{ $stats['total_users'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">Platform-wide reach</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Workers</span>
                    </div>
                    <p class="text-3xl font-black text-gray-900">{{ $stats['total_workers'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">Service providers</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Customers</span>
                    </div>
                    <p class="text-3xl font-black text-gray-900">{{ $stats['total_customers'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">Active employers</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Recent Growth</span>
                    </div>
                    <p class="text-3xl font-black text-gray-900">+{{ $stats['new_users'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">New this week</p>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white shadow-sm rounded-3xl border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Registered Users</h2>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 text-xs font-bold bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition">Filter</button>
                        <button class="px-4 py-2 text-xs font-bold bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition">Export</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">User Details</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Role</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Location</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Joined Date</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($users as $user)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-brand-100 text-brand-600 rounded-full flex items-center justify-center font-bold">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-900">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $user->phone_number }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($user->role === 'admin')
                                            <span class="px-2.5 py-1 bg-purple-100 text-purple-600 rounded-md text-[10px] font-black uppercase tracking-wider">Admin</span>
                                        @elseif($user->role === 'worker')
                                            <span class="px-2.5 py-1 bg-blue-100 text-blue-600 rounded-md text-[10px] font-black uppercase tracking-wider">Worker</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-amber-100 text-amber-600 rounded-md text-[10px] font-black uppercase tracking-wider">Customer</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $user->district ?? '--' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 font-medium">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button class="p-2 text-gray-400 hover:text-brand-600 transition" title="View Details">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </button>
                                            <button class="p-2 text-gray-400 hover:text-red-600 transition" title="Delete User">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-gray-100">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
