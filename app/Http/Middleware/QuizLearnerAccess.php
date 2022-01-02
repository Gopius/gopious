<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\LearnerQuizOption;

class QuizLearnerAccess
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
        $quiz = $request->route('quiz');
        $class = $request->route('class');
        $exists = LearnerQuizOption::where('learner_no', Auth::guard('learner')->user()->learner_id)
                            ->whereIn('quiz_question_no', $quiz->questions->pluck('quiz_question_id'))->first();
        if($exists != null){
            return redirect()->back()
            ->withErrors(['Quiz has been submitted Aready']);
        }
        if ($quiz->alway_open == 1) {
             return $next($request);
        }
        if(!$quiz->start_date->isPast()){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Quiz will start '. $quiz->start_date->diffForHumans()]);
        }
        if($quiz->end_date->isPast()){
            return redirect()->route('learner_class',$class->cat_id)
            ->withErrors(['Quiz ended '.$quiz->end_date->diffForHumans()]);
        }
        return $next($request);
    }
}
