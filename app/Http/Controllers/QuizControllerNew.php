<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizControllerNew extends Controller
{
    public function NewViewQuiz($account, Request $request, Quiz $quiz)
    {
        if ($quiz->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        // $course  = Course::findOrFail($course_id);
        // var_dump($course->course_title);die();

        $data['view'] = 'view-quiz';
        $data['header'] = 'course';
        $data['quiz'] = 'active';
        $data['main_quiz'] = $quiz;
        return view('instructor.dashboard',  $data);
    }


    function NewQuizQuestion($account, Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'quiz_question_title' => '',
        ]);
        $validated['type'] = 'multi_choice';
        $validated['score'] = '0';
        $validated['multiple_select'] = '0';
        $validated['quiz_no'] = $quiz->quiz_id;
        QuizQuestion::create($validated);
        return redirect()->back()->with('message', 'Updated successfully');
    }
    function buildQuiz($account, Request $request, Category $class, Quiz $quiz)
    {

        if ($quiz->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        // $course  = Course::findOrFail($course_id);
        // var_dump($course->course_title);die();
        $data['quiz'] = $quiz;
        $data['view'] = 'build_quiz';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['categories']  = Category::cursor();
        $data['upload_link']  = $request->url() . '/upload';
        return view('instructor.dashboard',  $data);
    }
}
