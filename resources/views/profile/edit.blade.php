<x-app-layout>
    <x-slot name="header">
        <h2 class="font-heading font-bold text-2xl text-gray-900 leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            <div class="p-8 md:p-12 bg-white shadow-xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100 transition-all hover:shadow-2xl hover:shadow-gray-200/60">
                <div class="max-w-xl">
                    <div class="mb-8 border-b border-gray-100 pb-4">
                        <h3 class="text-xl font-heading font-bold text-gray-900">Personal Information</h3>
                        <p class="text-sm text-gray-500">Update your account details and profile visibility.</p>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 md:p-12 bg-white shadow-xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100 transition-all hover:shadow-2xl hover:shadow-gray-200/60">
                <div class="max-w-xl">
                    <div class="mb-8 border-b border-gray-100 pb-4">
                        <h3 class="text-xl font-heading font-bold text-gray-900">Security</h3>
                        <p class="text-sm text-gray-500">Ensure your account is using a long, random password to stay secure.</p>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 md:p-12 bg-red-50/30 rounded-[2.5rem] border border-red-100/50 transition-all">
                <div class="max-w-xl">
                    <div class="mb-8 border-b border-red-100 pb-4">
                        <h3 class="text-xl font-heading font-bold text-red-900">Danger Zone</h3>
                        <p class="text-sm text-red-700/70">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
