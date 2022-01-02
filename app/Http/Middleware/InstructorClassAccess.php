<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\ClassInstructor;


class InstructorClassAccess
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
        // dd($class);
        $classes  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->pluck('cat_no')->toArray();
        if ( !in_array($class->cat_id, array_values($classes)) ) {
            
            abort(401, 'Unauthorized Access');
        }
        return $next($request);
    }
}
