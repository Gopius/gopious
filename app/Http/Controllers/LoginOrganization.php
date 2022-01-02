<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\Organization\ForgotPassword;
use App\Mail\RegistrationSuccessful;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\Setting;
use App\Models\State;
use App\Models\VerificationToken;
use App\Models\VerifyOrganizationTable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class LoginOrganization extends Controller
{
    public function index(Request $request)
    {
        return view('organization.login');
    }
    function processLogin(Request $request)
    {
        $validated = $request->validate([

            'email' => 'required|max:255',
            'password' => 'required',
        ]);


        if (Auth::guard('organization')->attempt($validated)) {
            $request->session()->regenerate();
            // session(['s_id' => $student->s_id]);
            return redirect()->route('organization_dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    function registerView(Request $request)
    {
        $data['org_types']   = OrganizationType::cursor();
        $data['countries']  = Country::cursor();

        if ($request->session()->has('status')) {
            $data['status'] = 'Registration was successful!';
        }
        // dd($countries);
        return view('organization.register', $data);
    }

    function stateJson(Request $request, $country_id)
    {
        $org_types  = OrganizationType::cursor();
        $states  = State::where("country_id", $country_id)->orderBy('name')->get();

        return response()->json($states->toArray())->header('Content-Type', 'application/json');
    }

    function registerProcess(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|unique:organizations|max:255',
            'phone' => 'required|max:255',
            'org_name' => 'required|max:255',
            'org_size' => 'required|max:255',
            'org_priority' => 'required|max:255',
            'org_why' => 'required|max:255',
            'org_type_no' => 'required|exists:organization_types,org_type_id',
            // 'org_address' => 'required|max:255',
            // 'state_no' => 'required|max:255',
            'about_org' => 'required|max:255',
            'password' => 'required',
        ]);
        $domain_name = Str::random(6) . '-' . Str::random(6);
        $validated['org_address'] = '';
        $validated['state_no'] = '303';
        $organization = Organization::create($validated);

        // Auth::guard('organization')->login($organization);
        $request->session()->flash('message', 'Registration was successful, Check Email to finish Registration!');
        $verifyOrganization = VerifyOrganizationTable::create([
            'org_no' => $organization->org_id,
            'token' => sha1(time())
        ]);
        $setting = Setting::create([
            'domain_name' => $domain_name,

            'org_no' => $organization->org_id,

        ]);
        $emailJob = (new SendEmail($organization, 'organization_registration',))->delay(Carbon::now()->addSeconds(5));

        dispatch($emailJob);
        $admins = Admin::all();
        foreach ($admins as $key => $admin) {
            $notifyEmailJob = (new SendEmail($organization, 'admin_new_organization', $admin))->delay(Carbon::now()->addSeconds(5));
            dispatch($notifyEmailJob);
        }

        return redirect()->route('login');

        // return view('organization.register', $data);
    }

    function registerVerifyToken($token)
    {
        $verifyOrg = VerifyOrganizationTable::where('token', $token)->first();
        if (isset($verifyOrg)) {
            $org = $verifyOrg->organization;
            if (!$org->approved) {
                $org->approved = 1;
                $org->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return abort(404);
        }
        $verifyOrg->token = sha1(time());
        $verifyOrg->save();
        return redirect()->route('login')->with('message', $status);
    }

    function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:organizations|max:255',
        ]);
        $organization = Organization::where('email', $validated['email'])->first();

        $verifyOrganization = VerificationToken::create([
            'org_no' => $organization->org_id,
            'token' => sha1(time())
        ]);
        $emailJob = (new SendEmail($organization, 'organization_forgot_password',))->delay(Carbon::now()->addSeconds(2));
        dispatch($emailJob);

        return redirect()->back()->with('message', 'Check your email for RESET link');
    }

    function resetPassword($token)
    {
        $verify = VerificationToken::where('token', $token)->first();
        if ($verify === null) {
            return abort(404);
        }

        return view('organization.reset-password');
    }

    function processResetPassword(Request $request, $token)
    {
        $verify = VerificationToken::where('token', $token)->first();
        if ($verify === null) {
            return abort(404);
        }
        $org = $verify->organization;
        $validated = $request->validate([
            'password' => 'required|min:6',
        ]);
        $org->update($validated);
        $verify->delete();
        return redirect()->route('login')->with('message', 'Password reset successfully');
    }
}
