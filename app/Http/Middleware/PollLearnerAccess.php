<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\LearnerPollOption;

class PollLearnerAccess
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
        $poll = $request->route('poll');
        $class = $request->route('class');
        $exists = LearnerPollOption::whereIn('poll_option_no', $poll->options->pluck('poll_option_id'))
                            ->where('learner_no', Auth::guard('learner')->user()->learner_id)->first();
        // dd($exists!=null);
        if($exists != null){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Poll has been taken Aready']);
        }

        if($poll->end_date->isPast()){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Poll ended '.$poll->end_date->diffForHumans()]);
        }
        return $next($request);
    }
}
