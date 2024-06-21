<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated as admin
        if (!auth()->guard('web-admin')->check()) {
            // Redirect to login page if not authenticated as admin
            return redirect()->route('login')->withErrors(['email' => 'Unauthorized access.']);
        }
        return $next($request);
    }
}
