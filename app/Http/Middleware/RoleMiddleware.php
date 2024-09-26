<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        // Check if the user has the required role
        if (!Auth::user()->roles()->where('name', $role)->exists()) {
            abort(403, 'Unauthorized action.'); // Abort if not authorized
        }

        return $next($request); // Proceed to the next middleware or request
    }
}
