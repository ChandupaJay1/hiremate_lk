<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:customer,worker'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        if ($request->role === 'customer') {
            $rules['email'] = ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class];
        } else {
            $rules['phone_number'] = ['required', 'string', 'max:20', 'unique:'.User::class];
            $rules['job_name'] = ['required', 'string', 'max:255'];
        }

        $request->validate($rules);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->role === 'customer' ? $request->email : null,
            'phone_number' => $request->role === 'worker' ? $request->phone_number : null,
            'job_name' => $request->role === 'worker' ? $request->job_name : null,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
