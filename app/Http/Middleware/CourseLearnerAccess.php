<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CourseLearnerAccess
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
        $course = $request->route('course');
        $class = $request->route('class');
        

        if($course->course_status == 0){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Course is currently not open.']);
        }
        return $next($request);
    }
}
