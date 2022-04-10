<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentLearner;
use App\Models\AssignmentPost;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\ClassInstructor;
use App\Models\Course;
use App\Models\Post;
use App\Models\PostInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{


    function learnerClassAssignment($account, Category $class, Assignment $assignment)
    {


        $data['header'] = 'class';
        $data['view'] = 'view-assignment';
        $data['class'] = $class;
        $data['class_title'] = $class->cat_title;
        // $data['instructors'] = ClassInstructor::where("cat_no", Auth::guard('instructor')->user()->instr_id)->get();
        $data['assignment'] = $assignment;
        return view('learner.dashboard',  $data);
    }
    function learnerSubmitClassAssignment(Request $request, $account, Category $class, Assignment $assignment)
    {

        $validated = $request->validate([
            'ass_answer' => 'required',
        ]);


        $validated['learner_no'] =  Auth::guard('learner')->user()->learner_id;
        $validated['ass_no'] =  $assignment->ass_id;

        $attachments =  $request->file('attachments');
        // dd( isset($attachments) );
        if (isset($attachments)) {
            foreach ($attachments as $key => $attachment) {
                $rr = new Request([
                    'file' => $attachment
                ]);
                $vd = $rr->validate([
                    'file' => 'required|max:1000000|mimes:jpeg,pdf,pptx,ppt,docx,doc,png',
                ]);
            }
        }
        $assignment_learner = AssignmentLearner::firstOrNew($validated);
        $assignment_learner->save();
        if (isset($attachments)) {
            foreach ($attachments as $key => $attachment) {
                $url = $attachment->store('assignment_attachments', 'public');
                $att = Attachment::create([
                    'url' => $url,
                    'type' => $attachment->getClientOriginalExtension(),
                    'ass_learner_no' => $assignment_learner->id,
                ]);
            }
        }

        // dd($attachments);

        return redirect()->route('learner_class', [$class->cat_id,]);
    }

















    function instructorAssignments()
    {
        $data['view'] = 'assignments';
        $data['header'] = 'course';
        $data['assignment'] = 'active';
        return view('instructor.dashboard',  $data);
    }
    function newAssignmentWithoutClass()
    {
        $data['view'] = 'add_assignment_without_class';
        $data['header'] = 'course';
        $data['assignment'] = 'active';
        $data['courses'] = Course::whereIn("courses.cat_no", function ($query) {
            $query->select('cat_no')
                ->from(with(new ClassInstructor)->getTable())
                ->where('instr_no', Auth::guard('instructor')->user()->instr_id);
        })->get();
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->with('class')->get();
        return view('instructor.dashboard',  $data);
    }
    function processNewAssignmentWithoutClass(Request $request)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'cat_no' => 'required',
            'ass_title' => 'required',
            'ass_content' => 'required',
            'course_no' => 'required|exists:courses,course_id',
            'end_date' => 'required',
        ]);

        $validated['instr_no'] =  Auth::guard('instructor')->user()->instr_id;
        $assignment = Assignment::create($validated);


        $post = Post::create([
            'content' => '<b>New Assignment Alert</b>',
            'cat_no' => $validated['cat_no'],
            'type' => '3',
        ]);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        $course_post = AssignmentPost::create([
            'ass_no' => $assignment->ass_id,
            'post_no' => $post->id,
        ]);
        return redirect()->route('instructor_assignments', [$validated['cat_no'],]);
    }
    function viewAllAssignmentSubmissions($account, Category $class, Assignment $assignment)
    {
        if ($assignment->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'class-assignment-submission';
        $data['assignment'] = $assignment;
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function viewSubmission($account, Category $class, Assignment $assignment, AssignmentLearner $assignment_learner)
    {
        if ($assignment->instructor->instr_id != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'view_assigment_submitted';
        $data['class'] = $class;
        $data['assignment'] = $assignment;
        $data['assignment_learner'] = $assignment_learner;
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function submissionStatus($account, Category $class, Assignment $assignment, AssignmentLearner $assignment_learner, $status)
    {

        $assignment_learner->status = $status;
        $assignment_learner->save();
        return redirect()->back();
    }

    function newAssignment($account, Category $class)
    {
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'add_assignment';
        $data['courses'] = Course::where("cat_no", $class->cat_id)->get();
        return view('instructor.dashboard',  $data);
    }
    function processNewAssignment(Request $request, $account, Category $class)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'ass_title' => 'required',
            'ass_content' => 'required',
            'course_no' => 'required|exists:courses,course_id',
            'end_date' => 'required',
        ]);

        $validated['instr_no'] =  Auth::guard('instructor')->user()->instr_id;
        $assignment = Assignment::create($validated);


        $post = Post::create([
            'content' => '<b>New Assignment Alert</b>',
            'cat_no' => $class->cat_id,
            'type' => '3',
        ]);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        $course_post = AssignmentPost::create([
            'ass_no' => $assignment->ass_id,
            'post_no' => $post->id,
        ]);
        return redirect()->route('instructor_class', [$class->cat_id,]);
    }

    function allAssignments()
    {
        $assignments  = Assignment::where('instr_no', Auth::guard('instructor')->user()->instr_id)->orderBy('ass_id', 'DESC')->get();
        foreach ($assignments as $key => $assignment) {
            // dd($assignment->course);
            $assignment['m_created'] = $assignment->created_at->diffForHumans();
            $assignment['m_end_date'] = $assignment->end_date->diffForHumans();
            $assignment['m_submissions'] = $assignment->submissions->count()."/";
            $assignment['class_title'] = $assignment->course->category->cat_title;
            $assignment['update_route'] = route('instructor_assignment_update', ['assignment' => $assignment->ass_id]);
            $assignment['view_link'] = route('instructor_assignment_submissions', [$assignment->course->category->cat_id, $assignment->ass_id]);
        }
        return response()->json($assignments->toArray())->header('Content-Type', 'application/json');
    }
    function deleteAssignment($account, Request $request, Assignment $assignment)
    {
        $assignment->delete();
        return response()->json($assignment->toArray())->header('Content-Type', 'application/json');
    }
    function updateAssignment($account, Request $request, Assignment $assignment)
    {
        $validated = $request->validate([

            'ass_title' => 'max:255',
            'ass_content' => '',
            'end_date' => '',
            'created_at' => '',
        ]);
        foreach ($validated as $key => $value) {
            if (!isset($value)) unset($validated[$key]);
        }
        $assignment->update($validated);
        return redirect()->back()->with('message', 'Updated successfully');
    }
    function getAllSubmittedAssignments($account, Category $class, Assignment $assignment)
    {
        $assignments  = AssignmentLearner::leftJoin('assignments', 'assignment_learners.ass_no', '=', 'assignments.ass_id')
            ->leftJoin('learners', 'assignment_learners.learner_no', '=', 'learners.learner_id')
            ->where('ass_no', $assignment->ass_id)->get(['*', 'assignment_learners.created_at AS submission_date', 'assignment_learners.id AS assignment_learner_id']);
        foreach ($assignments as $key => $assignment) {
            // $assignment->class;
            $assignment['submission_date'] = (new Carbon($assignment->submission_date))->diffForHumans();
            $assignment['view_link'] = route('instructor_view_assignment_submission', [$class->cat_id, $assignment->ass_id, $assignment->assignment_learner_id]);
        }
        return response()->json($assignments->toArray())->header('Content-Type', 'application/json');
    }
}
