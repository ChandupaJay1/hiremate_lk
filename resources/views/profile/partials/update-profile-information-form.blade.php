<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and phone number.") }}
        </p>
    </header>

    @php
        $user = auth()->user();
        $fields = ['name', 'phone_number', 'job_name', 'district', 'province'];
        $filled = collect($fields)->filter(fn($f) => !empty($user->$f))->count();
        $total  = count($fields);
        $percent = (int) round(($filled / $total) * 100);
    @endphp

    {{-- Profile Completion Bar --}}
    <div class="mt-4 mb-6 p-4 bg-gray-50 rounded-xl border border-gray-100">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-700">{{ __('Profile Completion') }}</span>
            <span class="text-sm font-bold {{ $percent >= 80 ? 'text-green-600' : ($percent >= 50 ? 'text-amber-600' : 'text-red-500') }}">
                {{ $percent }}%
            </span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden shadow-inner">
            <div class="h-full rounded-full transition-all duration-700 ease-out bg-brand-600 shadow-lg shadow-brand-500/20"
                style="width: {{ $percent }}%; min-width: {{ $percent > 0 ? '4px' : '0' }};"></div>
        </div>
        @if($percent < 100)
            <p class="mt-2 text-xs text-gray-500">
                {{ __('Fill in all fields below to complete your profile.') }}
            </p>
        @endif
    </div>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('auth.name') ?? __('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Phone Number --}}
        <div>
            <x-input-label for="phone_number" :value="__('auth.phone') ?? 'Phone Number'" />
            <x-text-input id="phone_number" name="phone_number" type="tel" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)" autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        @if($user->role === 'worker')
            {{-- Job Name --}}
            <div>
                <x-input-label for="job_name" :value="__('auth.job_name') ?? 'Job / Profession'" />
                <select id="job_name" name="job_name" class="mt-1 block w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm">
                    <option value="" disabled {{ empty(old('job_name', $user->job_name)) ? 'selected' : '' }}>{{ __('auth.select_profession') ?? 'Select profession' }}</option>
                    @foreach(['Mason','Electrician','Plumber','Carpenter','Painter','Cleaner','Driver','Mechanic','Gardener','Security Guard','Welder','AC Technician','Other'] as $job)
                        <option value="{{ $job }}" {{ old('job_name', $user->job_name) == $job ? 'selected' : '' }}>{{ $job }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('job_name')" />
            </div>

            {{-- Province --}}
            <div>
                <x-input-label for="profile_province" :value="__('auth.province') ?? 'Province'" />
                <select id="profile_province" name="province" class="mt-1 block w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm" onchange="profileFilterDistricts(this.value)">
                    <option value="" disabled {{ empty(old('province', $user->province)) ? 'selected' : '' }}>{{ __('auth.select_province') ?? 'Select province' }}</option>
                    @foreach(['Western','Central','Southern','Northern','Eastern','North Western','North Central','Uva','Sabaragamuwa'] as $prov)
                        <option value="{{ $prov }}" {{ old('province', $user->province) == $prov ? 'selected' : '' }}>{{ $prov }} Province</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('province')" />
            </div>

            {{-- District --}}
            <div>
                <x-input-label for="profile_district" :value="__('auth.district') ?? 'District'" />
                <select id="profile_district" name="district" class="mt-1 block w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm">
                    @php
                        $districtsByProvince = [
                            'Western'       => ['Colombo', 'Gampaha', 'Kalutara'],
                            'Central'       => ['Kandy', 'Matale', 'Nuwara Eliya'],
                            'Southern'      => ['Galle', 'Matara', 'Hambantota'],
                            'Northern'      => ['Jaffna', 'Kilinochchi', 'Mannar', 'Mullaitivu', 'Vavuniya'],
                            'Eastern'       => ['Ampara', 'Batticaloa', 'Trincomalee'],
                            'North Western' => ['Kurunegala', 'Puttalam'],
                            'North Central' => ['Anuradhapura', 'Polonnaruwa'],
                            'Uva'           => ['Badulla', 'Monaragala'],
                            'Sabaragamuwa'  => ['Ratnapura', 'Kegalle'],
                        ];
                        $currentProvince = old('province', $user->province);
                        $currentDistrict = old('district', $user->district);
                        $availableDistricts = $currentProvince && isset($districtsByProvince[$currentProvince])
                            ? $districtsByProvince[$currentProvince]
                            : array_merge(...array_values($districtsByProvince));
                    @endphp
                    <option value="" disabled {{ empty($currentDistrict) ? 'selected' : '' }}>{{ __('auth.select_district') ?? 'Select district' }}</option>
                    @foreach($availableDistricts as $d)
                        <option value="{{ $d }}" {{ $currentDistrict == $d ? 'selected' : '' }}>{{ $d }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('district')" />
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    const profileDistrictsByProvince = {
        'Western':       ['Colombo', 'Gampaha', 'Kalutara'],
        'Central':       ['Kandy', 'Matale', 'Nuwara Eliya'],
        'Southern':      ['Galle', 'Matara', 'Hambantota'],
        'Northern':      ['Jaffna', 'Kilinochchi', 'Mannar', 'Mullaitivu', 'Vavuniya'],
        'Eastern':       ['Ampara', 'Batticaloa', 'Trincomalee'],
        'North Western': ['Kurunegala', 'Puttalam'],
        'North Central': ['Anuradhapura', 'Polonnaruwa'],
        'Uva':           ['Badulla', 'Monaragala'],
        'Sabaragamuwa':  ['Ratnapura', 'Kegalle'],
    };

    function profileFilterDistricts(province) {
        const select = document.getElementById('profile_district');
        if (!select) return;
        const current = select.value;
        select.innerHTML = '<option value="" disabled>{{ __("auth.select_district") ?? "Select district" }}</option>';
        (profileDistrictsByProvince[province] || []).forEach(d => {
            const opt = document.createElement('option');
            opt.value = d;
            opt.textContent = d;
            if (d === current) opt.selected = true;
            select.appendChild(opt);
        });
    }
</script>
