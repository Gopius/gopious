<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\AssignmentLearner;

class AssignmentLearnerAccess
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
        $assignment = $request->route('assignment');
        $class = $request->route('class');
        $exists = AssignmentLearner::where('ass_no', $assignment->ass_id)
                            ->where('learner_no', Auth::guard('learner')->user()->learner_id)->first();
        if($exists != null){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Assignment has been submitted Aready']);
        }

        if($assignment->end_date->isPast()){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Assignment ended '.$assignment->end_date->diffForHumans()]);
        }
        return $next($request);
    }
}
