<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthLearner
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
        if (!Auth::guard('learner')->check()) {
            session()->put('url.learner_intended', url()->current());
            return redirect()->route('learner_login');
        }
        if (session()->has('url.learner_intended')) {
            return redirect(session()->pull('url.learner_intended'))->with('message', 'Welcome back');
        }
        return $next($request);
    }
}
