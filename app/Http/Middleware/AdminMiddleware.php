<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Strictly allow ONLY users from the dedicated 'admins' table via the 'admin' guard
        if (auth()->guard('admin')->check()) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
