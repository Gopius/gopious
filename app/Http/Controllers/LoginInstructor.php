<?php

namespace App\Http\Controllers;

use App\Jobs\SendForgotPasswordMail;
use App\Mail\Instructor\ForgotPassword as InstructorForgetPassword;
use App\Models\Instructor;
use App\Models\Setting;
use App\Models\VerificationToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginInstructor extends Controller
{

	
    function index(Request $request, $account)
    {
        $data['setting'] = Setting::where('domain_name', $account)->firstOrFail();
    	return view('instructor.login', $data);
    }
    function processLogin(Request $request)
    {
    	$validated = $request->validate([
            
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $validated['instr_email'] = $validated['email'];
        unset($validated['email']);
        

        
        if (Auth::guard('instructor')->attempt($validated) ) {
            $request->session()->regenerate();
            // session(['s_id' => $student->s_id]);
            return redirect()->route('instructor_dashboard');
        }
       
        return back()->withErrors([
             'instructor credentials do not match our records.',
        ]);
    	
    }

    function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'instr_email' => 'required|exists:instructors|max:255',
        ]);
        $instructor = Instructor::where('instr_email', $validated['instr_email'])->first();
        
        $verify = VerificationToken::create([
            'instr_no' => $instructor->instr_id,
            'token' => sha1(time())
        ]);
        $url = route('instructor_reset_password', [$instructor->verifications->first()->token,]);
        $emailJob = (new SendForgotPasswordMail($instructor, 'instructor_forgot', $url))->delay(Carbon::now()->addSeconds(2));
        dispatch($emailJob);
        // Mail::to($instructor->instr_email)->send(new InstructorForgetPassword($instructor));
        
        return redirect()->back()->with('message', 'Check your email for RESET link');

    }

    function resetPassword($account, $token)
    {
        $data['setting'] = Setting::where('domain_name', $account)->firstOrFail();
        $verify = VerificationToken::where('token', $token)->first();
        if($verify === null ){
            return abort(404);    
        }
        
        return view('instructor.reset-password', $data);
        
    }

    function processResetPassword(Request $request, $account, $token)
    {
        $verify = VerificationToken::where('token', $token)->first();
        if($verify === null ){
            return abort(404);    
        }
        $instructor = $verify->instructor;
        $validated = $request->validate([
            'password' => 'required|min:6',
        ]);
        $instructor->update($validated);
        $verify->delete();
        return redirect()->route('instructor_login')->with('message', 'Password reset successfully');
        
        
    }
}
