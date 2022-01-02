<?php

namespace App\Jobs;

use App\Mail\Admin\NewOrganization;
use App\Mail\Organization\ForgotPassword;
use App\Mail\RegistrationSuccessful;
use App\Mail\SendInstructorLogin;
use App\Mail\SendLearnerLogin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $name;
    protected $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $name = "", $url = "")
    {
        $this->user = $user;
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->name == "instructor_login") {
            Mail::to($this->user->instr_email)->send(new SendInstructorLogin($this->user, $this->url));
        }
        if ($this->name == "learner_login") {
            Mail::to($this->user->learner_email)->send(new SendLearnerLogin($this->user, $this->url));
        }

        if ($this->name == "organization_registration") {
            Mail::to($this->user)->send(new RegistrationSuccessful($this->user));
        }

        if ($this->name == "organization_forgot_password") {
            Mail::to($this->user)->send(new ForgotPassword($this->user));
        }

        if ($this->name == "admin_new_organization") {
            Mail::to($this->url)->send(new NewOrganization($this->user));
        }

        // Mail::to($user->learner_email)->send(new SendLearnerLogin($user));
    }
}
