<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthOrganizationIsLoggedIn
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
        // dd(Auth::guard('organization')->check());
        // Auth::guard('organization')->logout();
        if (Auth::guard('organization')->check() && Auth::guard('organization')->user()->approved) {
            return redirect()->route('organization_dashboard');
        }
        return $next($request);
    }
}
