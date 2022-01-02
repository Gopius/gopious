<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\ClassLearner;
use Illuminate\Support\Facades\Auth;

class LearnerClassAccess
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
        $class = $request->route('class');
        $classes  = ClassLearner::where("learner_no", Auth::guard('learner')->user()->learner_id)->pluck('cat_no')->toArray();
        if ( !in_array($class->cat_id, array_values($classes)) ) {
            
            abort(401, 'Unauthorized Access');
        }
        return $next($request);
    }
}
