<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users'   => User::count(),
            'total_workers' => User::where('role', 'worker')->count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'new_users'     => User::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        $users = User::latest()->paginate(10);

        return view('admin.dashboard', compact('stats', 'users'));
    }
    public function editProfile(): View
    {
        return view('admin.profile.edit');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->user('admin')->id)],
        ]);

        $request->user('admin')->fill($validated);

        if ($request->user('admin')->isDirty('email')) {
            $request->user('admin')->email_verified_at = null;
        }

        $request->user('admin')->save();

        return back()->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password:admin'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user('admin')->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
