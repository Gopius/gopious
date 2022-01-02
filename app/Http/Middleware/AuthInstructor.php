<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AuthInstructor
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
        if (!Auth::guard('instructor')->check()) {
            session()->put('url.intended', url()->current());
            return redirect()->route('instructor_login');
        }
        if (session()->has('url.intended')) {
            return redirect(session()->pull('url.intended'))->with('message', 'Welcome back');
        }
        return $next($request);
    }
}
