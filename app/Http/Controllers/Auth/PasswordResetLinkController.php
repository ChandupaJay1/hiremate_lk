<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login_id' => ['required', 'string'],
        ]);

        $user = \App\Models\User::where('phone_number', $request->login_id)->first();

        if (!$user) {
            return back()->withErrors(['login_id' => 'No account found with this phone number.']);
        }

        // Generate a 4-digit OTP
        $otp = rand(1000, 9999);

        // Save OTP to password_reset_tokens table
        \Illuminate\Support\Facades\DB::table('password_reset_tokens')->updateOrInsert(
            ['phone_number' => $request->login_id],
            [
                'token' => \Illuminate\Support\Facades\Hash::make($otp),
                'created_at' => now(),
            ]
        );

        // Send OTP via SMS
        $smsService = new \App\Services\SmsService();
        $message = "Your HireMate LK password reset OTP is: {$otp}. Please do not share this code.";
        $smsService->sendSms($request->login_id, $message);

        // Store the phone number in session for the next step
        session(['reset_phone_number' => $request->login_id]);

        return redirect()->route('password.verify')->with('status', 'An OTP has been sent to your phone number.');
    }
}
