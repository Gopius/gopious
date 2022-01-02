<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Poll;
use App\Models\PollOption;
use App\Models\LearnerPollOption;
use App\Models\Post;
use App\Models\PostInstructor;
use App\Models\PollPost;

class PollController extends Controller
{

    function learnerClassPoll($account, Category $class, Poll $poll)
    {


        $data['header'] = 'class';
        $data['view'] = 'view-poll';
        $data['class'] = $class;
        $data['class_title'] = $class->cat_title;
        // $data['instructors'] = ClassInstructor::where("cat_no", Auth::guard('instructor')->user()->instr_id)->get();
        $data['poll'] = $poll;
        return view('learner.dashboard',  $data);
    }
    function learnerSubmitClassPoll($account, Request $request, Category $class, Poll $poll)
    {

        $validated = $request->validate([
            'option' => 'required|exists:poll_options,poll_option_id',
        ]);
        // dd($request->input());

        $validated['learner_no'] =  Auth::guard('learner')->user()->learner_id;
        $validated['poll_option_no'] =  $validated['option'];
        unset($validated['option']);

        $assignment_learner = LearnerPollOption::firstOrNew($validated);
        $assignment_learner->save();


        return redirect()->route('learner_class', [$class->cat_id,]);
    }











    function viewPoll($account, Category $class, Poll $poll)
    {
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'view_poll';
        $data['poll'] = $poll;
        $data['poll']['total_votes'] = 0;
        foreach ($data['poll']->options as $key => $option) {
            $option['votes'] = $option->learnerPollOption->count();
            $data['poll']['total_votes'] += $option['votes'];
        }
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function newPoll($account, Category $class)
    {
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'add_poll';
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function processNewPoll(Request $request, $account, Category $class)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'poll_title' => 'required',
            'end_date' => 'required',
            'optionsArr' => 'required',
        ]);
        unset($validated['optionsArr']);
        $validated['cat_no'] = $class->cat_id;
        $validated['instr_no'] =  Auth::guard('instructor')->user()->instr_id;
        $poll = Poll::create($validated);

        $options_arr = $request->input('optionsArr');

        foreach ($options_arr as $key => $option) {
            $popt = PollOption::create([
                'poll_option_title' => $option,
                'poll_no' => $poll->poll_id,
            ]);
        }
        $post = Post::create([
            'content' => '<b>New Poll Alert</b>',
            'cat_no' => $class->cat_id,
            'type' => '2',
        ]);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        $poll_post = PollPost::create([
            'poll_no' => $poll->poll_id,
            'post_no' => $post->id,
        ]);
        return redirect()->route('instructor_class', [$class->cat_id,]);
    }

    function allPolls()
    {
        $polls  = Poll::where('instr_no', Auth::guard('instructor')->user()->instr_id)->orderBy('poll_id', 'desc')->get();
        foreach ($polls as $key => $poll) {
            $poll['m_created'] = $poll->created_at->diffForHumans();
            $poll['m_end_date'] = $poll->end_date->diffForHumans();
            $poll['update_route'] = route('instructor_poll_update', ['poll' => $poll->poll_id]);
            $poll['user_attempt_count'] = $poll->allUserAttemptCount;
            $count = 0;
            foreach ($poll['user_attempt_count'] as $key => $sub_op) {
                $count += $sub_op->learnerPollOption->count();
            }
            $poll['m_count'] = $count;
            $poll['view_link'] = route('instructor_poll_view', [$poll->class->cat_id, $poll->poll_id]);
        }
        return response()->json($polls->toArray())->header('Content-Type', 'application/json');
    }
}
