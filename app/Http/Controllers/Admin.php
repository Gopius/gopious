<?php

namespace App\Http\Controllers;

use App\Jobs\SendForgotPasswordMail;
use App\Mail\Admin\ForgotPassword;
use App\Models\Admin as AdminModel;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\Learner;
use App\Models\Organization;
use App\Models\VerificationToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Admin extends Controller
{
    function index(Request $request)
    {
        $data['dashboard'] = 'active';
        // $data['header'] = 'home';
        // $data['view'] = 'dashboard';
        return view('admin.login',  $data);
    }

    function processLogin(Request $request)
    {
        $validated = $request->validate([

            'email' => 'required|max:255',
            'password' => 'required',
        ]);



        if (Auth::guard('admin')->attempt($validated)) {
            $request->session()->regenerate();
            // session(['s_id' => $student->s_id]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'The provided credentials do not match our records.',
        ]);
    }
    function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:admins|max:255',
        ]);

        $admin = AdminModel::where('email', $validated['email'])->first();

        $verify = VerificationToken::create([
            'admin_no' => $admin->admin_id,
            'token' => sha1(time())
        ]);
        $emailJob = (new SendForgotPasswordMail($admin, 'admin_forgot',))->delay(Carbon::now()->addSeconds(2));
        dispatch($emailJob);

        return redirect()->back()->with('message', 'Check your email for RESET link');
    }


    function resetPassword($token)
    {
        $verify = VerificationToken::where('token', $token)->first();
        if ($verify === null) {
            return abort(404);
        }

        return view('admin.reset-password');
    }

    function processResetPassword(Request $request, $token)
    {
        $verify = VerificationToken::where('token', $token)->first();
        if ($verify === null) {
            return abort(404);
        }
        $admin = $verify->admin;
        $validated = $request->validate([
            'password' => 'required|min:6',
        ]);
        $admin->update($validated);
        $verify->delete();
        return redirect()->route('admin.login')->with('message', 'Password reset successfully');
    }

    function dashboard(Request $request)
    {
        $data['dashboard'] = 'active';
        $data['header'] = 'home';
        $data['view'] = 'dashboard';
        $data['admins']  = AdminModel::all();
        $data['learners']  = Learner::orderBy('learner_id', 'desc')->get();
        $data['instructors']  = Instructor::orderBy('instr_id', 'desc')->get();
        $data['organizations'] = Organization::latest()->paginate(5);
        $data['all_user'] = DB::select("SELECT DATE_FORMAT(created_at, '%m-%Y') new_date, COUNT(*) as numbers FROM
        ( SELECT created_at, 'learner', learner_email as email FROM `learners`  UNION SELECT created_at, 'instructor', instr_email as email FROM `instructors`)  n GROUP BY new_date ORDER BY new_date DESC LIMIT 5", []);

        return view('admin.dashboard',  $data);
    }

    function organizations(Request $request)
    {
        $data['organizations'] = 'active';
        $data['header'] = 'organizations';
        $data['view'] = 'organizations';

        $validated = $request->validate([
            's' => '',
        ]);
        $allOrg = Organization::latest();
        if (isset($validated['s'])) {
            $allOrg = $allOrg->where('org_name', 'like', ('%' . $validated['s'] . '%'))
                ->orWhere('email', 'like', ('%' . $validated['s'] . '%'));;
        }
        $data['organizations']  = $allOrg->paginate();

        return view('admin.dashboard',  $data);
    }

    function viewOrganization(Request $request, Organization $organization)
    {
        $data['organizations'] = 'active';
        $data['header'] = 'home';
        $data['view'] = 'view-organization';

        $validated = $request->validate([
            's' => '',
        ]);

        // $data['classes']  = Category::where("org_no", $organization->org_id)
        //     ->with('instructors')->latest()->paginate();
        $data['learners']  = Learner::where("org_no", $organization->org_id)->orderBy('learner_id', 'desc');
        $data['instructors']  = Instructor::where("org_no", $organization->org_id)->orderBy('instr_id', 'desc');
        if (isset($validated['s'])) {
            $data['learners'] = $data['learners']->where('learner_name', 'like', ('%' . $validated['s'] . '%'))
                ->orWhere('learner_email', 'like', ('%' . $validated['s'] . '%'));;
            $data['instructors'] = $data['instructors']->where('instr_name', 'like', ('%' . $validated['s'] . '%'))
                ->orWhere('instr_email', 'like', ('%' . $validated['s'] . '%'));;
        }

        $data['learners']  = $data['learners']->paginate();
        $data['instructors']  = $data['instructors']->paginate();
        $data['organization']  = $organization;

        return view('admin.dashboard',  $data);
    }
    function updateOrganizations(Request $request, Organization $organization)
    {
        $validated = $request->validate([
            'approved' => '',
            'org_name' => '',
        ]);
        $organization->update($validated);

        return redirect()->back()->with('message', 'Updated successfully');
    }
    function logout(Request $request)
    {
        Auth::guard('organization')->logout();
        return redirect()->route('admin.login');
    }
}
