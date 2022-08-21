<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\SendInstructorLogin;
use App\Mail\SendLearnerLogin;
use App\Models\Category;
use App\Models\ClassInstructor;
use App\Models\ClassLearner;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Learner;
use App\Models\Outcome;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\Requirement;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Organization extends Controller
{
    function index(Request $request)
    {
        $data['dashboard'] = 'active';
        $data['header'] = 'home';
        $data['view'] = 'dashboard';
        $data['classes']  = Category::where("org_no", Auth::guard('organization')->user()->org_id)
            ->with('instructors')->latest()->get();
        $data['learners']  = Learner::where("org_no", Auth::guard('organization')->user()->org_id)->orderBy('learner_id', 'desc')->get();
        $data['instructors']  = Instructor::where("org_no", Auth::guard('organization')->user()->org_id)->orderBy('instr_id', 'desc')->get();



        $data['all_user'] = DB::select("SELECT DATE_FORMAT(created_at, '%m-%Y') new_date, COUNT(*) as numbers FROM
        ( SELECT created_at, 'learner', learner_email as email FROM `learners` where org_no = ? UNION SELECT created_at, 'instructor', instr_email as email FROM `instructors`  where org_no = ?)  n GROUP BY new_date ORDER BY new_date DESC LIMIT 5", [Auth::guard('organization')->user()->org_id, Auth::guard('organization')->user()->org_id]);

        $count_total = $data['learners']->count() + $data['instructors']->count();
        $this_month = Learner::where("org_no", Auth::guard('organization')->user()->org_id)->whereMonth('created_at', Carbon::now()->month)->count()
            +
            Instructor::where("org_no", Auth::guard('organization')->user()->org_id)->whereMonth('created_at', Carbon::now()->month)->count();

        $x = $this_month;
        $y = $count_total;

        try {
            $percent = $x / $y;
            $data['percent_age'] = number_format($percent * 100);
        } catch (\Throwable $th) {
            $data['percent_age'] = 0;
        }


        return view('organization.dashboard',  $data);
    }

    function timeline(Request $request)
    {
        $data['header'] = 'home';
        $data['view'] = 'timeline';
        $data['timeline'] = 'active';
        $data['learners']  = Learner::where("org_no", Auth::guard('organization')->user()->org_id)->orderBy('learner_id', 'desc')->get();
        $data['instructors']  = Instructor::where("org_no", Auth::guard('organization')->user()->org_id)->orderBy('instr_id', 'desc')->get();
        $data['classes']  = Category::where("org_no", Auth::guard('organization')->user()->org_id)->orderBy('cat_id', 'desc')->get();
        $data['quizzes']  = Quiz::leftJoin('courses', 'quizzes.course_no', '=', 'courses.course_id')
            ->leftJoin('categories', 'courses.cat_no', '=', 'categories.cat_id')
            ->where('categories.org_no', Auth::guard('organization')->user()->org_id)->get();
        $data['courses']  = Course::leftJoin('categories', 'courses.cat_no', '=', 'categories.cat_id')
            ->where('categories.org_no', Auth::guard('organization')->user()->org_id)->get();

        $data['posts'] = Post::leftJoin('categories', 'posts.cat_no', '=', 'categories.cat_id')
            ->where('categories.org_no', Auth::guard('organization')->user()->org_id)
            ->orderBy('posts.id', 'desc')
            ->simplePaginate(15);

        // dd($data['quizzes'][0]);
        return view('organization.dashboard',  $data);
    }



    function profile(Request $request)
    {
        $data['view'] = 'profile';
        $data['header'] = 'appearance';
        // $data['settings'] = 'active';
        $data['profile'] = 'active';
        return view('organization.dashboard',  $data);
    }
    function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'phone' => 'max:255',
            'user_avatar_url' => 'max:2048',
            'password' => 'max:255',
        ]);
        $organization = Auth::guard('organization')->user();


        if ($request->file('user_avatar_url') !== null && $request->file('user_avatar_url')->getSize() < 2200000) {
            Storage::delete('public/' . $organization->user_avatar_url);
            $validated['user_avatar_url'] = $request->file('user_avatar_url')->store('org_user_images', 'public');
        }
        $organization->update($validated);



        return redirect()->route('organization_user_profile');
    }


    function appearance(Request $request)
    {
        $data['view'] = 'settings';
        $data['header'] = 'appearance';
        $data['settings'] = 'active';
        return view('organization.dashboard',  $data);
    }

    function updateAppearance(Request $request)
    {
        // dd($request->file());
        $organization = Auth::guard('organization')->user();
        $organization->about_org = $request->input('about_org');
        $organization->org_phone = $request->input('org_phone');
        $organization->homepage = $request->input('homepage');
        $organization->website = $request->input('website');
        $organization->fb = $request->input('fb');
        $organization->twitter = $request->input('twitter');
        $organization->linkedin = $request->input('linkedin');
        if ($request->file('profile_avatar') !== null && $request->file('profile_avatar')->getSize() < 2200000) {
            Storage::delete('public/' . $organization->org_avatar_url);
            $organization->org_avatar_url = $request->file('profile_avatar')->store('org_images', 'public');
        }
        if ($request->file('profile_avatar_logo') !== null && $request->file('profile_avatar_logo')->getSize() < 2200000) {
            Storage::delete('public/' . $organization->org_long_icon_url);
            $organization->org_long_icon_url = $request->file('profile_avatar_logo')->store('org_logo', 'public');
        }
        if ($request->file('profile_avatar_icon') !== null && $request->file('profile_avatar_icon')->getSize() < 2200000) {
            Storage::delete('public/' . $organization->org_square_icon_url);
            $organization->org_square_icon_url = $request->file('profile_avatar_icon')->store('org_icon', 'public');
        }
        $organization->save();



        return redirect()->route('organization_customize');
    }

    function customize(Request $request)
    {
        $data['view'] = 'customize';
        $data['header'] = 'appearance';
        $data['customize'] = 'active';
        return view('organization.dashboard',  $data);
    }
    function updateCustomize(Request $request)
    {
        $setting = Setting::where('org_no', Auth::guard('organization')->user()->org_id)->first();
        if ($setting == null) {
            $setting = Setting::create([
                'color' => $request->input('color'),
                'theme' => '0',
                'css' => $request->input('css'),
                'js' => $request->input('js'),
                'org_no' => Auth::guard('organization')->user()->org_id,

            ]);
        } else {
            $setting->color = $request->input('color');
            $setting->theme = '0';
            $setting->css = $request->input('css');
            $setting->js = $request->input('js');
            $setting->save();
        }



        return redirect()->route('domainMapping');
    }

    function domainMapping(Request $request)
    {
        $data['view'] = 'domainMapping';
        $data['header'] = 'appearance';
        $data['domainMapping'] = 'active';
        return view('organization.dashboard',  $data);
    }
    function updateDomain(Request $request)
    {
        $validated = $request->validate([

            'domain_name' => 'required|unique:settings,domain_name',
        ]);
        $setting = Setting::where('org_no', Auth::guard('organization')->user()->org_id)->first();
        if ($setting == null) {

            $setting = Setting::create([
                'domain_name' => $request->input('domain_name'),

                'org_no' => Auth::guard('organization')->user()->org_id,

            ]);
        } else {

            $setting->domain_name = $request->input('domain_name');
            $setting->save();
        }






        return redirect()->route('domainMapping');
    }




    function courses(Request $request)
    {
        $data['view'] = 'courses';
        $data['header'] = 'course';
        $data['course'] = 'active';
        return view('organization.dashboard',  $data);
    }
    function allCourse(Request $request)
    {
        $courses  = Course::get()->where("org_no", Auth::guard('organization')->user()->org_id)->sortByDesc('course_id')->values();
        return response()->json($courses->toArray())->header('Content-Type', 'application/json');
    }

    function user()
    {
        $data['view'] = 'users';
        $data['header'] = 'user';
        $data['user'] = 'active';
        // dd("upd");
        return view('organization.dashboard',  $data);
    }

    function allUsers(Request $request)
    {
        $instructors  = Instructor::where("org_no", Auth::guard('organization')->user()->org_id)->select('instr_name as name', 'instr_email as email', 'instr_phone as phone', 'instr_status as status', 'instr_id as id', 'created_at', DB::raw('"instructor" as type'));
        $learners  = Learner::where("org_no", Auth::guard('organization')->user()->org_id)->select('learner_name as name', 'learner_email as email', 'learner_phone as phone', 'learner_status as status', 'learner_id as id', 'created_at', DB::raw('"learner" as type'));
        $users = $instructors->union($learners)->latest()->get();
        foreach ($users as $key => $user) {
            if ('instructor' == $user->type) {
                $user['classes'] = ClassInstructor::where('instr_no', $user->id)->with('class')->get();
                $user['update_route'] = route('organization_instuctor_update', [$user->id]);
            }
            if ('learner' == $user->type) {
                $user['classes'] = ClassLearner::where('learner_no', $user->id)->with('class')->get();
                $user['update_route'] = route('organization_learner_update', [$user->id]);
            }
        }

        // ->sortByDesc('learner_id')
        return new JsonResponse($users->values());
    }

    function addUser(Request $request)
    {
        $data['view'] = 'add_user';
        $data['header'] = 'users';
        $data['add_user'] = 'active';
        $data['categories']  = Category::where("org_no", Auth::guard('organization')->user()->org_id)->cursor();
        // dd("dd");
        return view('organization.dashboard',  $data);
    }

    function addBulkUser()
    {
        $data['view'] = 'add_user_bulk';
        $data['header'] = 'users';
        $data['add_user'] = 'active';
        $data['categories']  = Category::where("org_no", Auth::guard('organization')->user()->org_id)->cursor();
        return view('organization.dashboard',  $data);
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function importCsv(Request $request)
    {
        // dd($request->file);
        $file = $request->file;

        try {
            $customerArr = $this->csvToArray($file);
            $user_type = $request->type;



            if ($user_type == 'learner') {
                $data = [];

                foreach ($customerArr as $key => $value) {
                    $data[$key]['learner_name'] = $value['first_name'] . " " . $value['last_name'];
                    $data[$key]['learner_email'] = $value['email'];
                    $data[$key]['learner_phone'] = $value['phone'];
                    $data[$key]['open_password'] = Str::random(6);
                    $data[$key]['password'] = $data[$key]['open_password'];
                    $data[$key]['org_no'] = Auth::guard('organization')->user()->org_id;
                    Learner::create($data[$key]);
                }
            }
            if ($user_type == 'instructor') {
                $data = [];

                foreach ($customerArr as $key => $value) {
                    $data[$key]['instr_name'] = $value['first_name'] . " " . $value['last_name'];
                    $data[$key]['instr_email'] = $value['email'];
                    $data[$key]['instr_phone'] = $value['phone'];
                    $data[$key]['open_password'] = Str::random(6);
                    $data[$key]['password'] = $data[$key]['open_password'];
                    $data[$key]['org_no'] = Auth::guard('organization')->user()->org_id;
                    Instructor::create($data[$key]);
                }
            }
            return redirect()->route('organization_users')->with('message', 'Users Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', $th->getMessage());
        }
    }


    function processNewUser(Request $request)
    {
        // dd($request->all());
        // dd($request->input('type'));die();
        if ($request->input('type') == 'instructor') {
            $validated = $request->validate([

                'name' => 'required',
                'email' => 'required|unique:instructors,instr_email',
                'phone' => 'required',
                'classes' => 'required',
            ]);
            $validated['instr_name'] = $validated['name'];
            $validated['instr_email'] = $validated['email'];
            $validated['instr_phone'] = $validated['phone'];
            $validated['open_password'] = Str::random(6);
            $validated['password'] = $validated['open_password'];
            $validated['org_no'] = Auth::guard('organization')->user()->org_id;
            $instructor = Instructor::create($validated);
            $classes = $request->input('classes');
            foreach ($classes as $key => $class) {
                $cls = ClassInstructor::create([
                    'cat_no' => $class,
                    'instr_no' => $instructor->instr_id,
                ]);
            }
            $login_url = route('instructor_login', [Auth::guard('organization')->user()->setting->domain_name]);
            $emailJob = (new SendEmail($instructor, 'instructor_login', $login_url))->delay(Carbon::now()->addSeconds(5));
            dispatch($emailJob);
        } elseif ($request->input('type') == 'learner') {
            $validated = $request->validate([

                'name' => 'required',
                'email' => 'required|unique:learners,learner_email',
                'phone' => 'required',
                'classes' => 'required',
            ]);
            $validated['learner_name'] = $validated['name'];
            $validated['learner_email'] = $validated['email'];
            $validated['learner_phone'] = $validated['phone'];
            $validated['open_password'] = Str::random(6);
            $validated['password'] = $validated['open_password'];
            $validated['org_no'] = Auth::guard('organization')->user()->org_id;
            $learner = Learner::create($validated);
            $classes = $request->input('classes');
            foreach ($classes as $key => $class) {
                $cls = ClassLearner::create([
                    'cat_no' => $class,
                    'learner_no' => $learner->learner_id,
                ]);
            }
            $login_url = route('learner_login', [Auth::guard('organization')->user()->setting->domain_name]);
            $emailJob = (new SendEmail($learner, 'learner_login', $login_url))->delay(Carbon::now()->addSeconds(5));
            dispatch($emailJob);
        } else {
            return redirect()->route('organization_users');
        }
        return redirect()->route('organization_users')->with('message', 'User Added Successfully, User will recieve login details.');
    }

    function processNewBulkUser(Request $request)
    {
        $m_classes = null;
        $failed_row = '';
        // foreach ($request->input('classes') as $key => $class) {
        //     $m_classes[] = $class;
        // }
        if ($request->input('type') == null) return redirect()->route('organization_users');
        foreach ($request->input('type') as $key => $type) {
            if ($type == 'instructor') {
                $validated = [
                    'name' => $request->input('f_name')[$key] . ' ' . $request->input('l_name')[$key],
                    'email' => $request->input('email')[$key],
                    'phone' => 'no number',
                    // 'classes' => $m_classes[$key],

                ];
                $validator = Validator::make($validated, [
                    'name' => 'required',
                    'email' => 'required|unique:instructors,instr_email',
                    'phone' => 'required',
                    // 'classes' => 'required',
                ]);
                if ($validator->fails()) {
                    $failed_row .= $validated['email'] . " Failed ";
                    continue;
                }
                $validated['instr_name'] = $validated['name'];
                $validated['instr_email'] = $validated['email'];
                $validated['instr_phone'] = $validated['phone'];
                $validated['open_password'] = Str::random(6);
                $validated['password'] = $validated['open_password'];
                $validated['org_no'] = Auth::guard('organization')->user()->org_id;
                $instructor = Instructor::create($validated);
                // $classes = $validated['classes'];
                // foreach ($classes as $key => $class) {
                //     $cls = ClassInstructor::create([
                //                             'cat_no'=>$class,
                //                             'instr_no'=>$instructor->instr_id,
                //                             ]);
                // }
                $login_url = route('instructor_login', [Auth::guard('organization')->user()->setting->domain_name]);
                $emailJob = (new SendEmail($instructor, 'instructor_login', $login_url))->delay(Carbon::now()->addSeconds(5));
                dispatch($emailJob);
            } elseif ($type == 'learner') {
                $validated = [
                    'name' => $request->input('f_name')[$key] . ' ' . $request->input('l_name')[$key],
                    'email' => $request->input('email')[$key],
                    'phone' => 'no number',
                    // 'classes' => $m_classes[$key],

                ];
                $validator = Validator::make($validated, [
                    'name' => 'required',
                    'email' => 'required|unique:learners,learner_email',
                    'phone' => 'required',
                    // 'classes' => 'required',
                ]);
                if ($validator->fails()) {
                    $failed_row .= $validated['email'] . " Failed ";
                    continue;
                }
                $validated['learner_name'] = $validated['name'];
                $validated['learner_email'] = $validated['email'];
                $validated['learner_phone'] = $validated['phone'];
                $validated['open_password'] = Str::random(6);
                $validated['password'] = $validated['open_password'];
                $validated['org_no'] = Auth::guard('organization')->user()->org_id;
                $learner = Learner::create($validated);
                // $classes = $validated['classes'];
                // foreach ($classes as $key => $class) {
                //     $cls = ClassLearner::create([
                //                             'cat_no'=>$class,
                //                             'learner_no'=>$learner->learner_id,
                //                             ]);
                // }
                $login_url = route('learner_login', [Auth::guard('organization')->user()->setting->domain_name]);
                $emailJob = (new SendEmail($learner, 'learner_login', $login_url))->delay(Carbon::now()->addSeconds(5));
                dispatch($emailJob);
            } else {
                return redirect()->route('organization_users');
            }
        }
        if ($failed_row != '') {
            return redirect()->route('organization_users')->withErrors($failed_row);
        }
        return redirect()->route('organization_users')->with('message', 'Users Added Successfully, Users will recieve login details.');
    }

    function deleteUser(Request $request,  $user_id, $type)
    {
        if ($type == 'instructor') {
            return redirect()->route('organization_delete_update', [$user_id]);
        }

        if ($type == 'learner') {
            return redirect()->route('organization_delete_learner', [$user_id]);
        }
        return redirect()->back()->with('message', 'Unable to Delete Successfully');
    }

    function logout(Request $request)
    {
        Auth::guard('organization')->logout();
        return redirect()->route('login');
    }
}
