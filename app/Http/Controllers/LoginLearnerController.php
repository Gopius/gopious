<?php

namespace App\Http\Controllers;

use App\Jobs\SendForgotPasswordMail;
use App\Models\Learner;
use App\Models\Setting;
use App\Models\VerificationToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginLearnerController extends Controller
{
    public function index(Request $request, $account)
    {
        $data['setting'] = Setting::where('domain_name', $account)->firstOrFail();
        return view('learner.login', $data);
    }
    function processLogin(Request $request)
    {
        $validated = $request->validate([

            'email' => 'required|max:255.',
            'password' => 'required',
        ]);

        $validated['learner_email'] = $validated['email'];
        unset($validated['email']);

        if (Auth::guard('learner')->attempt($validated)) {
            $request->session()->regenerate();
            // session(['s_id' => $student->s_id]);
            return redirect('/learner');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'learner_email' => 'required|exists:learners|max:255',
        ]);
        $learner = Learner::where('learner_email', $validated['learner_email'])->first();

        $verify = VerificationToken::create([
            'learner_no' => $learner->learner_id,
            'token' => sha1(time())
        ]);
        $url = route('learner_reset_password', [$learner->verifications->first()->token,]);
        $emailJob = (new SendForgotPasswordMail($learner, 'learner_forgot', $url))->delay(Carbon::now()->addSeconds(2));
        dispatch($emailJob);

        return redirect()->back()->with('message', 'Check your email for RESET link');
    }

    function resetPassword($account, $token)
    {
        $data['setting'] = Setting::where('domain_name', $account)->firstOrFail();
        $verify = VerificationToken::where('token', $token)->first();
        if ($verify === null) {
            return abort(404);
        }

        return view('learner.reset-password', $data);
    }

    function processResetPassword(Request $request, $account, $token)
    {
        $verify = VerificationToken::where('token', $token)->first();
        if ($verify === null) {
            return abort(404);
        }
        $learner = $verify->learner;
        $validated = $request->validate([
            'password' => 'required|min:6',
        ]);
        $learner->update($validated);
        $verify->delete();
        return redirect()->route('learner_login')->with('message', 'Password reset successfully');
    }
}
