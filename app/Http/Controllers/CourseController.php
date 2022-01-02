<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Course;
use App\Models\Requirement;
use App\Models\Outcome;
use App\Models\Block;
use App\Models\BlockLearner;

use App\Models\Post;
use App\Models\PostInstructor;
use App\Models\CoursePost;

class CourseController extends Controller
{


    function learnerClassCourse($account, Category $class, Course $course)
    {
        $data['header'] = 'class';
        $data['view'] = 'intro-to-course';
        $data['class'] = $class;
        $data['class_title'] = $class->cat_title;
        // $data['instructors'] = ClassInstructor::where("cat_no", Auth::guard('instructor')->user()->instr_id)->get();
        $data['course'] = $course;
        $data['courses']  = Course::leftJoin('categories', 'courses.cat_no', '=', 'categories.cat_id')
            ->leftJoin('classes_learners', 'categories.cat_id', '=', 'classes_learners.cat_no')
            ->where('classes_learners.learner_no', Auth::guard('learner')->user()->learner_id)->get();
        return view('learner.dashboard',  $data);
    }
    function learnerClassCourseLearn($account, Category $class, Course $course)
    {
        $data['header'] = 'class';
        $data['view'] = 'learn-course';
        $data['class'] = $class;
        $data['class_title'] = $class->cat_title;
        // $data['instructors'] = ClassInstructor::where("cat_no", Auth::guard('instructor')->user()->instr_id)->get();
        $data['course'] = $course;
        return view('learner.dashboard',  $data);
    }
    function learnerClassCourseLearnTicked($account, Category $class, Course $course, Block $block)
    {
        $bl = BlockLearner::firstOrNew([
            'block_no' => $block->block_id,
            'learner_no' => Auth::guard('learner')->user()->learner_id,
        ]);
        $bl->viewed = !$bl->viewed;
        $bl->save();

        return response()->json($bl)->header('Content-Type', 'application/json');
    }












    function newCourse($account, Category $class)
    {
        $data['dashboard'] = 'add_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['view'] = 'add_course';
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function buildCourse($account, Category $class, $course_id)
    {


        $course  = Course::findOrFail($course_id);
        if ($course->instr_no != Auth::guard('instructor')->user()->instr_id) {
            return abort(401);
        }
        // var_dump($course->course_title);die();
        $data['course'] = $course;
        $data['view'] = 'build_course';
        $data['header'] = 'class';
        $data['class_title'] = $class->cat_title;
        $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }
    function processNewCourse($account, Request $request, Category $class)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'course_title' => 'required',
            'course_desc' => 'required',
            'course_status' => 'required',
            'course_cover_image' => 'required|max:2048',
            // 'cat_no' => 'required|exists:categories,cat_id',
        ]);
        $cover_image = $request->file('course_cover_image');

        $validated['cat_no'] = $class->cat_id;
        $validated['instr_no'] = Auth::guard('instructor')->user()->instr_id;
        $validated['course_cover_img_url'] = $cover_image->store('cover_images', 'public');
        $course = Course::create($validated);
        unset($validated['course_cover_image']);
        $requirements = $request->input('requirements');
        $outcomes = $request->input('outcomes');
        foreach ($requirements as $key => $requirement) {
            $reqmt = Requirement::create([
                'requirement_title' => $requirement,
                'course_no' => $course->course_id,
            ]);
        }
        foreach ($outcomes as $key => $outcome) {
            $outcm = Outcome::create([
                'outcome_title' => $outcome,
                'course_no' => $course->course_id,
            ]);
        }
        $post = Post::create([
            'content' => '<b>New Course Alert</b>',
            'cat_no' => $class->cat_id,
            'type' => '1',
        ]);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        $course_post = CoursePost::create([
            'course_no' => $course->course_id,
            'post_no' => $post->id,
        ]);
        return redirect()->route('instructor_course_build', [$class->cat_id, $course->course_id,]);
    }


    function allCourse()
    {
        $courses  = Course::leftJoin('categories', 'courses.cat_no', '=', 'categories.cat_id')
            ->leftJoin('classes_instructors', 'categories.cat_id', '=', 'classes_instructors.cat_no')
            ->where('classes_instructors.instr_no', Auth::guard('instructor')->user()->instr_id)->orderBy('course_id', 'DESC')->get();
        foreach ($courses as $key => $course) {
            $course['url'] = route('instructor_course_build', [$course->cat_no, $course->course_id]);
            $course['learners_url'] = route('instructor_course_learners', [$course->course_id]);
        }
        return response()->json($courses->toArray())->header('Content-Type', 'application/json');
    }
    function updateCourse($account, Request $request, Course $course)
    {
        // dd($request->input());
        $validated = $request->validate([

            'course_title' => '',
            'course_desc' => '',
            'course_status' => '',

        ]);
        // dd($request->all());
        $course->update($validated);
        return response()->json($course->toArray())->header('Content-Type', 'application/json');
    }
    function deleteCourse($account, Request $request, Course $course)
    {

        $course->delete();
        return response()->json($course->toArray())->header('Content-Type', 'application/json');
    }
}
