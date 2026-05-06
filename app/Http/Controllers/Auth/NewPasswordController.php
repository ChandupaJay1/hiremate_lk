<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        if (!session('reset_phone_number')) {
            return redirect()->route('password.request');
        }

        return view('auth.verify-otp');
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'numeric', 'digits:4'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $phoneNumber = session('reset_phone_number');

        if (!$phoneNumber) {
            return redirect()->route('password.request')->withErrors(['login_id' => 'Session expired. Please try again.']);
        }

        $record = \Illuminate\Support\Facades\DB::table('password_reset_tokens')
            ->where('phone_number', $phoneNumber)
            ->first();

        if (!$record || !Hash::check($request->otp, $record->token)) {
            return back()->withErrors(['otp' => 'The provided OTP is invalid.']);
        }

        $user = User::where('phone_number', $phoneNumber)->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'User not found.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        event(new PasswordReset($user));

        // Delete the token
        \Illuminate\Support\Facades\DB::table('password_reset_tokens')
            ->where('phone_number', $phoneNumber)
            ->delete();

        session()->forget('reset_phone_number');

        return redirect()->route('login')->with('status', 'Your password has been reset successfully. Please login.');
    }
}
