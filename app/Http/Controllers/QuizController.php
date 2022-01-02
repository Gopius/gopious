<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClassInstructor;
use App\Models\Course;
use App\Models\Learner;
use App\Models\LearnerQuizOption;
use App\Models\Post;
use App\Models\PostInstructor;
use App\Models\Quiz;
use App\Models\QuizOption;
use App\Models\QuizPost;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{

    function learnerClassQuiz($account, Request $request, Category $class, Quiz $quiz)
    {


        $data['header'] = 'class';
        $data['view'] = 'view-quiz';
        $data['class'] = $class;
        // $data['u_link'] = route('');
        $data['class_title'] = $class->cat_title;
        // $data['instructors'] = ClassInstructor::where("cat_no", Auth::guard('instructor')->user()->instr_id)->get();
        $data['quiz'] = $quiz;
        foreach ($quiz->questions as $key => $question) {
            foreach ($question->options as $key => $option) {
                # code...
            }
        }
        return view('learner.dashboard',  $data);
    }

    function learnerSubmitClassQuiz($account, Request $request, Category $class, Quiz $quiz)
    {

        $questions  = $request->input('questions');
        foreach ($questions as $key => $question) {
            // var_dump(isset($question['quiz_question_id'])?$question['quiz_question_id']:'');
            // var_dump(isset($question['selectedIndex'])?$question['selectedIndex']:'');
            $quiz_option_learner = LearnerQuizOption::firstOrNew([
                'quiz_question_no' => $question['quiz_question_id'],
                'learner_no' => Auth::guard('learner')->user()->learner_id,
                'quiz_option_no' => isset($question['selectedIndex']) ? $question['selectedIndex'] : null,
                'content' => isset($question['selected']) ? $question['selected'] : null,
            ]);
            $quiz_option_learner->save();
        }
        return response()->json(['status' => true])->header('Content-Type', 'application/json');
    }








    function instructorQuizzes()
    {
        $data['view'] = 'quizzes';
        $data['header'] = 'course';
        $data['quiz'] = 'active';
        return view('instructor.dashboard',  $data);
    }
    function newQuizWithoutClass()
    {
        $data['view'] = 'add_quiz_without_class';
        $data['header'] = 'course';
        $data['quiz'] = 'active';
        $data['courses'] = Course::whereIn("courses.cat_no", function ($query) {
            $query->select('cat_no')
                ->from(with(new ClassInstructor)->getTable())
                ->where('instr_no', Auth::guard('instructor')->user()->instr_id);
        })->get();
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->with('class')->get();
        return view('instructor.dashboard',  $data);
    }
    function processNewQuizWithoutClass(Request $request)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'cat_no' => 'required',
            'quiz_title' => 'required',
            'course_no' => 'required|exists:courses,course_id',
            'start_date' => '',
            'duration' => 'required',
            'end_date' => '',
            'alway_open' => '',
        ]);
        if (isset($validated['alway_open'])) {
            $validated['alway_open'] = 1;
        }
        $validated['start_date'] = Carbon::now()->timestamp;
        $validated['end_date'] = Carbon::now()->timestamp;
        $validated['instr_no'] =  Auth::guard('instructor')->user()->instr_id;
        $quiz = Quiz::create($validated);

        $post = Post::create([
            'content' => '<b>New Quiz Alert</b>',
            'cat_no' => $validated['cat_no'],
            'type' => '4',
        ]);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        $poll_post = QuizPost::create([
            'quiz_no' => $quiz->quiz_id,
            'post_no' => $post->id,
        ]);
        return redirect()->route('instructor_quiz_build', [$validated['cat_no'], $quiz->quiz_id]);
    }
    function viewAllQuizSubmissions($account, Category $class, Quiz $quiz)
    {
        if ($quiz->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'class-quiz-submission';
        $data['quiz'] = $quiz;
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }

    function viewSubmission($account, Category $class, Quiz $quiz, Learner $learner)
    {
        if ($quiz->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'view_quiz_submission';
        $data['class'] = $class;
        $data['quiz'] = $quiz;
        $data['learner'] = $learner;
        $data['questions'] = LearnerQuizOption::leftJoin(
            'quiz_questions',
            'learner_quiz_options.quiz_question_no',
            'quiz_questions.quiz_question_id'
        )
            ->where('learner_quiz_options.learner_no', $learner->learner_id)
            ->where('quiz_questions.quiz_no', $quiz->quiz_id)
            ->get();

        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function submissionStatus($account, Category $class, Quiz $quiz, LearnerQuizOption $learner_quiz_option, $status)
    {

        $learner_quiz_option->status = $status;
        $learner_quiz_option->save();
        return redirect()->back();
    }
    function newQuiz($account, Category $class)
    {
        // $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'add_quiz';
        $data['courses'] = Course::where("cat_no", $class->cat_id)->get();
        return view('instructor.dashboard',  $data);
    }

    function processNewQuiz($account, Request $request, Category $class)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'quiz_title' => 'required',
            'course_no' => 'required|exists:courses,course_id',
            'start_date' => 'required',
            'duration' => 'required',
            'end_date' => 'required',
        ]);

        $validated['instr_no'] =  Auth::guard('instructor')->user()->instr_id;
        $quiz = Quiz::create($validated);

        $post = Post::create([
            'content' => '<b>New Quiz Alert</b>',
            'cat_no' => $class->cat_id,
            'type' => '4',
        ]);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        $poll_post = QuizPost::create([
            'quiz_no' => $quiz->quiz_id,
            'post_no' => $post->id,
        ]);
        return redirect()->route('instructor_quiz_build', [$class->cat_id, $quiz->quiz_id]);
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
    function processBuiltQuiz($account, Request $request, Category $class, Quiz $quiz)
    {
        if ($quiz->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        $validated = $request->validate([

            'questions' => 'required',
            // 'score' => 'required',
        ]);
        foreach ($validated['questions'] as $question) {
            $multiple_select = isset($question['multi_options']) ? $question['multi_options'] : '0';
            $quiz_question = QuizQuestion::create([
                'quiz_question_title' => $question['question'],
                'type' => $question['type'],
                'score' => $question['score'],
                'multiple_select' => $multiple_select,
                'quiz_no' => $quiz->quiz_id,
            ]);

            foreach ($question['options'] as $key => $option) {
                $quiz_option = QuizOption::create([
                    'quiz_option_title' => $option['value'],
                    'is_correct' => $option['checked'],
                    'quiz_question_no' => $quiz_question->quiz_question_id,
                ]);
            }
        }
        return response()->json(['status' => true])->header('Content-Type', 'application/json');
    }

    function allQuizzes()
    {
        $quizzes  = Quiz::where('instr_no', Auth::guard('instructor')->user()->instr_id)->orderBy('quiz_id', 'DESC')->get();
        foreach ($quizzes as $key => $quiz) {
            $quiz['m_start_date'] = $quiz->start_date->diffForHumans();
            $quiz['m_end_date'] = $quiz->end_date->diffForHumans();
            $quiz['update_route'] = route('instructor_quiz_update', [$quiz->quiz_id]);
            $quiz['view_route'] = route('instructor_quiz_view', [$quiz->quiz_id]);
            $quiz['view_link'] = route('instructor_quiz_submissions', [$quiz->course->category->cat_id, $quiz->quiz_id]);
        }
        return response()->json($quizzes->toArray())->header('Content-Type', 'application/json');
    }

    function viewQuiz($account, Request $request, Quiz $quiz)
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

    function deleteQuiz($account, Request $request, Quiz $quiz)
    {
        $quiz->delete();
        return response()->json($quiz->toArray())->header('Content-Type', 'application/json');
    }
    function updateQuiz($account, Request $request, Quiz $quiz)
    {
        $validated = $request->validate([

            'quiz_title' => 'max:255',
            'start_date' => '',
            'alway_open' => '',
            'end_date' => '',
            'created_at' => '',
            'duration' => '',
        ]);
        foreach ($validated as $key => $value) {
            if (!isset($value)) unset($validated[$key]);
        }
        $quiz->update($validated);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    function newQuizQuestion($account, Request $request, Quiz $quiz)
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

    function updateQuizQuestion($account, Request $request, QuizQuestion $quizQuestion)
    {
        $validated = $request->validate([

            'quiz_question_title' => '',
            'score' => '',

        ]);
        $quizQuestion->update($validated);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    function addOptionQuizQuestion($account, Request $request, QuizQuestion $quizQuestion)
    {
        $validated = $request->validate([

            'quiz_option_title' => '',
            'is_correct' => '',

        ]);
        $validated['is_correct'] = '0';
        $validated['quiz_question_no'] = $quizQuestion->quiz_question_id;
        QuizOption::create($validated);
        return redirect()->back()->with('message', 'added successfully');
    }
    function updateQuizOption($account, Request $request, QuizOption $quizOption)
    {
        $validated = $request->validate([

            'quiz_option_title' => '',
            'is_correct' => '',

        ]);
        $quizOption->update($validated);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    function getAllSubmittedQuizzes($account, Category $class, Quiz $quiz)
    {
        DB::statement("set sql_mode = ''");
        $quizzes  = LearnerQuizOption::leftJoin('quiz_questions', 'learner_quiz_options.quiz_question_no', '=', 'quiz_questions.quiz_question_id')
            ->leftJoin('quizzes', 'quiz_questions.quiz_no', '=', 'quizzes.quiz_id')
            ->leftJoin('learners', 'learner_quiz_options.learner_no', '=', 'learners.learner_id')
            ->where('quizzes.quiz_id', $quiz->quiz_id)->groupBy('learners.learner_id')->get(['*', 'learner_quiz_options.created_at AS submission_date']);
        foreach ($quizzes as $key => $quiz) {
            // $assignment->class;
            $quiz['view_link'] = route('instructor_view_quiz_submission', [$class->cat_id, $quiz->quiz_id, $quiz->learner_id]);
            $quiz['questions'] = LearnerQuizOption::leftJoin(
                'quiz_questions',
                'learner_quiz_options.quiz_question_no',
                'quiz_questions.quiz_question_id'
            )
                ->where('learner_quiz_options.learner_no', $quiz->learner_no)
                ->where('quiz_questions.quiz_no', $quiz->quiz_id)
                ->get();
            $quiz['correct_option'] = 0;
            $quiz['unattented_option'] = 0;
            foreach ($quiz['questions'] as $question) {
                if ($question->type == 'short_answer') {
                    if ($question->status == 1) {
                        $quiz['correct_option'] += 1;
                    }
                    if ($question->status == 0) {
                        $quiz['unattented_option'] += 1;
                    }
                }
                foreach ($question->options as $option) {
                    if (isset($question->quiz_option_no) && $question->quiz_option_no == $option->quiz_option_id && $option->is_correct == 1) {
                        $quiz['correct_option'] += 1;
                    }
                }
            }
        }
        return response()->json($quizzes->toArray())->header('Content-Type', 'application/json');
    }
}
