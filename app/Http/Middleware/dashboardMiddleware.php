<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LandingMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika user sudah login, jangan boleh buka landing page
        if (auth()->check()) {
            // Redirect berdasarkan role
            if (auth()->user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect('/user');
        }

        return $next($request);
    }
}
