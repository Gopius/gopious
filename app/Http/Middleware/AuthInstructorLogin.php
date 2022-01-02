<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthInstructorLogin
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
        $account = $request->route('account');
        if (Auth::guard('instructor')->check() ) {
            return redirect()->route('instructor_dashboard', [$account]);
        }
        return $next($request);
    }
}
