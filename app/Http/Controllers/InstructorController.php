<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\SendInstructorLogin;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\ClassInstructor;
use App\Models\ClassLearner;
use App\Models\CommentPost;
use App\Models\Course;
use App\Models\CoursePost;
use App\Models\Instructor;
use App\Models\Learner;
use App\Models\Outcome;
use App\Models\Poll;
use App\Models\PollOption;
use App\Models\PollPost;
use App\Models\Post;
use App\Models\PostAttachment;
use App\Models\PostInstructor;
use App\Models\PostLike;
use App\Models\Quiz;
use App\Models\Requirement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class InstructorController extends Controller
{
    function instructor(Request $request)
    {
        $data['view'] = 'instructors';
        $data['header'] = 'user';
        $data['instructor'] = 'active';
        return view('organization.dashboard',  $data);
    }

    function allInstructors(Request $request)
    {
        $instructors  = Instructor::where("org_no", Auth::guard('organization')->user()->org_id)
            ->with('classes')->get()
            ->sortByDesc('instr_id');
        foreach ($instructors as $key => $instructor) {
            $instructor['update_route'] = route('organization_instuctor_update', [$instructor->instr_id]);
        }
        return new JsonResponse($instructors->values());
    }
    public function comment_edit(Request $request)
    {
        CommentPost::find($request->comment_id)->update([
            "content" => $request->comment
        ]);
        return redirect()->back();
    }

    public function comment_delete($aa, $id)
    {
        CommentPost::find($id)->delete();
        return redirect()->back();
    }

    function updateInstructor(Request $request, Instructor $instructor)
    {
        // dd($request->input());
        $validated = $request->validate([

            'instr_name' => '',
            'instr_email' => 'unique:instructors,instr_email',
            'instr_phone' => '',
            'instr_classes' => ''

        ]);
        foreach ($validated as $key => $value) {
            if (!isset($value)) unset($validated[$key]);
        }
        $instructor->update($validated);
        // if ($request->new_password != null) {
        //     Instructor::where('instr_id', $instructor->instr_id)->update(['password' => Hash::make($request->new_password), 'open_password' => $request->new_password]);
        // }
        if ($request->cat_class) {
            $cat = Category::where('cat_id', $request->cat_class)->first();
            $cat_class = DB::table('classes_instructors')->where('instr_no', $instructor->instr_id)->first();
            // dd($cat_class);
            if ($cat_class == null) {
                // dd("if");
                DB::table('classes_instructors')->insert(['cat_no' => $cat->cat_id, 'instr_no' => $instructor->instr_id]);
            } else {
                // dd($cat->cat_id);
                DB::table('classes_instructors')->where('instr_no', $instructor->instr_id)->update(['cat_no' => $cat->cat_id]);
            }
        }
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    function deleteInstructor(Request $request, Instructor $instructor)
    {

        $instructor->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
    function sendInstructorMail(Instructor $instructor)
    {
        $login_url = route('instructor_login', [Auth::guard('organization')->user()->setting->domain_name]);
        $emailJob = (new SendEmail($instructor, 'instructor_login', $login_url))->delay(Carbon::now()->addSeconds(5));
        dispatch($emailJob);
        return response()->json([
            'status' => true,
            'message' => 'Instructor Mail Sent Successfully, Instructor will recieve login details.',
        ])->header('Content-Type', 'application/json');
    }
    function newInstructor(Request $request)
    {
        $data['view'] = 'add_instructor';
        $data['header'] = 'instructor';
        $data['new_instructor'] = 'active';
        $data['categories']  = Category::where("org_no", Auth::guard('organization')->user()->org_id)->cursor();
        return view('organization.dashboard',  $data);
    }
    function processNewInstructor(Request $request)
    {
        // dd($request->input('instr_classes'));die();
        $validated = $request->validate([

            'instr_name' => 'required',
            'instr_email' => 'required|unique:instructors,instr_email',
            'instr_phone' => 'required',
            'instr_classes' => 'required',
        ]);
        $validated['open_password'] = Str::random(6);
        $validated['password'] = $validated['open_password'];
        $validated['org_no'] = Auth::guard('organization')->user()->org_id;
        $instructor = Instructor::create($validated);
        $classes = $request->input('instr_classes');
        foreach ($classes as $key => $class) {
            $cls = ClassInstructor::create([
                'cat_no' => $class,
                'instr_no' => $instructor->instr_id,
            ]);
        }
        $login_url = route('instructor_login', [Auth::guard('organization')->user()->setting->domain_name]);
        $emailJob = (new SendEmail($instructor, 'instructor_login', $login_url))->delay(Carbon::now()->addSeconds(5));
        dispatch($emailJob);
        return redirect()->route('organization_instuctors')->with('message', 'InstructorCreated Successfully, Instructor will recieve login details.');
    }







    function instructorDashboard()
    {
        $data['dashboard'] = 'active';
        $data['header'] = 'home';
        $data['view'] = 'dashboard';
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->get();
        foreach ($data['classes'] as $key => $class) {
            $class->class;
        }
        $data['courses']  = Course::leftJoin('categories', 'courses.cat_no', '=', 'categories.cat_id')
            ->leftJoin('classes_instructors', 'categories.cat_id', '=', 'classes_instructors.cat_no')
            ->where('classes_instructors.instr_no', Auth::guard('instructor')->user()->instr_id)->get();
        $data['quizzes']  = Quiz::where('instr_no', Auth::guard('instructor')->user()->instr_id)->get();
        $data['learners']  = ClassLearner::leftJoin('learners', 'classes_learners.learner_no', 'learners.learner_id')
            // ->leftJoin('categories', 'classes_learners.cat_no', 'categories.cat_id')
            ->whereIn("classes_learners.cat_no", function ($query) {
                $query->select('cat_no')
                    ->from(with(new ClassInstructor)->getTable())
                    ->where('instr_no', Auth::guard('instructor')->user()->instr_id);
            })->get();
        $data['posts'] = Post::whereIn("posts.cat_no", function ($query) {
            $query->select('cat_no')
                ->from(with(new ClassInstructor)->getTable())
                ->where('instr_no', Auth::guard('instructor')->user()->instr_id);
        })
            ->orderBy('posts.id', 'desc')
            ->simplePaginate(15);
        return view('instructor.dashboard',  $data);
    }
    function instructorProile(Request $request)
    {
        $data['dashboard'] = 'active';
        $data['header'] = 'home';
        $data['view'] = 'profile';
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->get();
        foreach ($data['classes'] as $key => $class) {
            $class->class;
        }
        return view('instructor.dashboard',  $data);
    }
    function updateInstructorProile(Request $request)
    {
        $instructor  = Auth::guard('instructor')->user();
        $validated = $request->validate([

            'instr_name' => '',
            'instr_email' => 'unique:instructors,instr_email',
            'instr_phone' => '',
            'profile_avatar' => 'max:2048',
        ]);
        if ($request->file('profile_avatar') !== null && $request->file('profile_avatar')->getSize() < 2200000) {

            Storage::delete('public/' . $instructor->instr_avatar_url);
            $validated['instr_avatar_url'] = $request->file('profile_avatar')->store('instructor_images', 'public');
        }
        $instructor->update($validated);

        return redirect()->route('instructor_profile');
    }


    function instructorClass($account, Category $class)
    {
        $data['header'] = 'class';
        $data['view'] = 'class-dashboard';
        $data['class'] = $class;
        $data['class_title'] = $class->cat_title;

        $data['instructors'] = ClassInstructor::where("cat_no", $class->cat_id)->get();
        // dd($data['instructors']);
        $data['courses'] = Course::where("cat_no", $class->cat_id)->get();
        $data['polls'] = Poll::where("cat_no", $class->cat_id)->get();
        $data['posts'] = Post::where("cat_no", $class->cat_id)->orderBy('posts.id', 'desc')->simplePaginate(15);

        // dd($data['posts']);
        $data['assignments'] = Assignment::leftJoin('courses', 'assignments.course_no', '=', 'courses.course_id')
            ->leftJoin('instructors', 'assignments.instr_no', '=', 'instructors.instr_id')

            ->where("courses.cat_no", $class->cat_id)->get();
        $data['quizzes'] = Quiz::leftJoin('courses', 'quizzes.course_no', '=', 'courses.course_id')
            ->leftJoin('instructors', 'quizzes.instr_no', '=', 'instructors.instr_id')

            ->where("courses.cat_no", $class->cat_id)->get();
        $data['learners']  = ClassLearner::leftJoin('learners', 'classes_learners.learner_no', 'learners.learner_id')
            ->whereIn("classes_learners.cat_no", function ($query) {
                $query->select('cat_no')
                    ->from(with(new ClassInstructor)->getTable())
                    ->where('instr_no', Auth::guard('instructor')->user()->instr_id);
            })
            ->where('classes_learners.cat_no', $class->cat_id)
            ->get();

        return view('instructor.dashboard',  $data);
    }

    function updateInstructorClass(Request $request, $account, Category $class)
    {
        $validated = $request->validate([
            'cat_cover_image' => 'max:2048',
            // 'cat_no' => 'required|exists:categories,cat_id',
        ]);
        if (isset($validated['cat_cover_image'])) {
            $validated['cat_cover_image'] = $validated['cat_cover_image']->store('class_cover_images', 'public');
            Storage::delete('public/' . $class->cat_cover_image);
        }
        $class->update($validated);
        return redirect()->back();
    }

    function instructorClasses(Request $request)
    {
        $data['view'] = 'classes';
        $data['header'] = 'class';
        $data['class'] = 'active';
        // dd($data);
        return view('instructor.dashboard',  $data);
    }
    function instructorClassCreate(Request $request)
    {
        $data['view'] = 'add_class';
        $data['header'] = 'class';
        $data['class'] = 'active';
        return view('instructor.dashboard',  $data);
    }
    function processNewClass(Request $request)
    {


        $validated = $request->validate([

            'cat_title' => 'required',
            'cat_desc' => 'required',

            'cat_status' => 'required',
            'cat_max_student' => 'required',
            'cover_image' => 'required|max:2048',
        ]);

        do {
            $validated['cat_code'] = strtoupper(substr(explode(' ', $validated['cat_title'])[0] ?? '', 0, 1)) . strtoupper(substr(explode(' ', $validated['cat_title'])[1] ?? '', 0, 1));
            $validated['cat_code'] .= '-' . Str::random(7 - strlen($validated['cat_code']));
            $cat_code_m = Category::where('cat_code', $validated['cat_code'])->first();
        } while ($cat_code_m != null);

        $cover_image = $request->file('cover_image');
        $validated['cat_cover_image'] = $cover_image->store('class_cover_images', 'public');
        $validated['org_no'] = Auth::guard('instructor')->user()->org_no;
        // dd($validated);die();
        $course = Category::create($validated);
        $cls = ClassInstructor::create([
            'cat_no' => $course->cat_id,
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
        ]);

        return redirect()->route('instructor_classes')->with('message', 'Class Created Successfully');
    }
    function updateClass($account, Request $request, Category $class)
    {
        $validated = $request->validate([
            'cat_title' => '',
            'cat_desc' => '',
            'cat_status' => '',
            'cat_code' => 'nullable|min:4|unique:categories,cat_code',
            'cat_max_student' => '',
        ]);
        foreach ($validated as $key => $value) {
            if (!isset($value)) unset($validated[$key]);
        }
        $validated['cat_status'] = (isset($validated['cat_status']) && $validated['cat_status'] === 'on') ? 1 : 0;
        $class->update($validated);
        return redirect()->back()->with('message', 'Updated Successfully');
    }

    public function deleteClass($id, $id2)
    {
        $class = ClassInstructor::where('cat_no', $id2)->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }

    public function classDetail($id2, $id)
    {
        $data['view'] = 'classDetail';
        $data['header'] = 'class';
        $data['learner'] = 'active';
        $classes  = ClassInstructor::where('cat_no', $id)->first();
        $data['class'] = $classes->class;
        $data['quizzes'] = $classes->class->quizzes;
        $data['assignments'] = $classes->instructor->assignments;
        $data['polls'] = $classes->instructor->polls;
        // dd($data);
       
        return view('instructor.content.classDetail',  $data);
    }

    function instructorActivities(Request $request)
    {
        $data['view'] = 'courses';
        $data['header'] = 'course';
        $data['course'] = 'active';
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->get();
        foreach ($data['classes'] as $key => $class) {
            $class->class;
        }
        return view('instructor.dashboard',  $data);
    }

    function instructorCourseLearners(Request $request, $account, Course $course)
    {
        $data['view'] = 'course_learners';
        $data['header'] = 'course';
        $data['course'] = 'active';
        $data['m_course'] = $course;
        $data['learners']  = ClassLearner::leftJoin('learners', 'classes_learners.learner_no', 'learners.learner_id')
            // ->leftJoin('categories', 'classes_learners.cat_no', 'categories.cat_id')
            ->whereIn("classes_learners.cat_no", function ($query) {
                $query->select('cat_no')
                    ->from(with(new ClassInstructor)->getTable())
                    ->where('instr_no', Auth::guard('instructor')->user()->instr_id);
            })->get();
        foreach ($data['learners'] as $key => $learner) {
            $learner['block_count'] = 0;
            $learner['block_count_viewed'] = 0;
            foreach ($course->chapters as  $chapter) {
                $learner['block_count'] += count($chapter->blocks);
                foreach ($chapter->blocks as $block) {
                    // var_dump($block->blockLearnerForLearner->where('learner_no', $learner->learner_id)->first()->viewed??null);
                    $learner['block_count_viewed'] += $block->blockLearnerForLearner->where('learner_no', $learner->learner_id)->first()->viewed ?? 0;
                }
            }
        }

        return view('instructor.dashboard',  $data);
    }

    function newCourse()
    {
        $data['view'] = 'add_course_without_class';
        $data['header'] = 'course';
        $data['course'] = 'active';
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->with('class')->get();
        // $data['categories']  = Category::cursor();
        return view('instructor.dashboard',  $data);
    }

    function processNewCourse(Request $request, Category $class)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([
            'cat_no' => 'required',
            'course_title' => 'required',
            'course_desc' => 'required',
            'course_status' => 'required',
            'course_cover_image' => 'required|max:2048',
            // 'cat_no' => 'required|exists:categories,cat_id',
        ]);
        $cover_image = $request->file('course_cover_image');


        $validated['instr_no'] = Auth::guard('instructor')->user()->instr_id;
        $validated['course_cover_img_url'] = $cover_image->store('cover_images', 'public');
        $course = Course::create($validated);
        unset($validated['course_cover_image']);
        $requirements = $request->input('requirements');
        $outcomes = $request->input('outcomes');
        foreach ($requirements ?? [] as $key => $requirement) {
            $reqmt = Requirement::create([
                'requirement_title' => $requirement,
                'course_no' => $course->course_id,
            ]);
        }
        foreach ($outcomes ?? [] as $key => $outcome) {
            $outcm = Outcome::create([
                'outcome_title' => $outcome,
                'course_no' => $course->course_id,
            ]);
        }
        $post = Post::create([
            'content' => '<b>New Course Alert</b>',
            'cat_no' => $validated['cat_no'],
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
        return redirect()->route('instructor_course_build', [$validated['cat_no'], $course->course_id,]);
    }

    function instructorPolls(Request $request)
    {
        $data['view'] = 'polls';
        $data['header'] = 'course';
        $data['poll'] = 'active';
        return view('instructor.dashboard',  $data);
    }

    function newPoll()
    {

        $data['view'] = 'add_poll_without_class';
        $data['header'] = 'course';
        $data['poll'] = 'active';
        $data['classes']  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->with('class')->get();
        return view('instructor.dashboard',  $data);
    }
    function processNewPoll(Request $request)
    {
        // var_dump($_POST);die();
        $validated = $request->validate([

            'cat_no' => 'required',
            'poll_title' => 'required',
            'end_date' => 'required',
            'optionsArr' => 'required',
        ]);
        unset($validated['optionsArr']);
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
            'cat_no' => $validated['cat_no'],
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
        return redirect()->route('instructor_polls');
    }

    function deletePoll($account, Request $request, Poll $poll)
    {
        $poll->delete();
        return response()->json($poll->toArray())->header('Content-Type', 'application/json');
    }

    function updatePoll($account, Request $request, Poll $poll)
    {
        $validated = $request->validate([

            'poll_title' => 'max:255',
            'end_date' => '',
            'created_at' => '',
        ]);
        foreach ($validated as $key => $value) {
            if (!isset($value)) unset($validated[$key]);
        }
        $poll->update($validated);
        return redirect()->back()->with('message', 'Updated successfully');
    }



    function logout(Request $request)
    {
        Auth::guard('instructor')->logout();
        return redirect()->route('instructor_login');
    }
    function allInstructorClasses(Request $request)
    {
        $classes  = ClassInstructor::where("instr_no", Auth::guard('instructor')->user()->instr_id)->get();
        foreach ($classes as $key => $class) {
            // $class->class;
            $class['m_route'] = route('instructor_class', $class->class->cat_id);
            $class['update_route'] = route('instructor_class_update', [$class->class->cat_id]);
        }
        // $classes  = Category::get()->where("org_no", Auth::guard('organization')->user()->org_id)->sortByDesc('cat_id')->values();
        return response()->json($classes->toArray())->header('Content-Type', 'application/json');
    }

    function instructorUploadClassPost(Request $request, $accout, Category $class)
    {
        $validated = $request->validate([

            'content' => 'required',
        ]);
        $validated['cat_no'] = $class->cat_id;
        $post = Post::create($validated);
        $post_instructor = PostInstructor::create([
            'instr_no' => Auth::guard('instructor')->user()->instr_id,
            'post_no' => $post->id,
        ]);
        if ($request->file('post_attachment') !== null) {
            foreach ($request->file('post_attachment') as $key => $file) {
                $url = $file->store('post_attachment', 'public');
                $post_attachment = PostAttachment::create([
                    'url' => $url,
                    'post_no' => $post->id,
                ]);
            }
        }
        $post->class->cat_title;
        $post->attachments;
        $post->likes;
        $post->comments;
        $post->poster = $post->post_instructor->instructor->instr_name ?? $post->instructor->instr_name ?? '';
        $post->date = $post->created_at->diffForHumans();
        return response()->json(['status' => true, 'post' => $post])->header('Content-Type', 'application/json');
    }

    function instructorUploadClassPostComment(Request $request, $accout, Category $class)
    {
        $validated = $request->validate([
            'content' => 'required',
            'post_no' => 'required',
        ]);
        $validated['instr_no'] = Auth::guard('instructor')->user()->instr_id;
        $comment_post = CommentPost::create($validated);


        $comment_post->poster = $comment_post->instructor->instr_name ?? $post->instructor->instr_name ?? '';
        $comment_post->date = $comment_post->created_at->diffForHumans();
        return response()->json(['status' => true, 'comment_post' => $comment_post, 'comment_post_count' => CommentPost::where('post_no', $validated['post_no'])->count()])->header('Content-Type', 'application/json');
    }
    function instructorUploadClassPostLike(Request $request, $account, Category $class)
    {
        $validated = $request->validate([
            'post_no' => 'required',
        ]);
        $validated['instr_no'] = Auth::guard('instructor')->user()->instr_id;
        $like_post = PostLike::where('instr_no', $validated['instr_no'])
            ->where('post_no', $validated['post_no']);
        if ($like_post->first() == null) {
            $like_post = PostLike::create($validated);
            return response()->json(['status' => true, 'like_post_count' => PostLike::where('post_no', $validated['post_no'])->count()])->header('Content-Type', 'application/json');
        } else {
            $like_post->delete();
            return response()->json(['status' => false, 'like_post_count' => PostLike::where('post_no', $validated['post_no'])->count()])->header('Content-Type', 'application/json');
        }
    }
}
