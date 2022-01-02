<?php

namespace App\Jobs;

use App\Mail\Admin\ForgotPassword;
use App\Mail\Instructor\ForgotPassword as InstructorForgotPassword;
use App\Mail\Learner\ForgotPassword as LearnerForgotPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordMail implements ShouldQueue
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
        if ($this->name == "admin_forgot") {
            Mail::to($this->user)->send(new ForgotPassword($this->user));
        }
        if ($this->name == "instructor_forgot") {
            Mail::to($this->user->instr_email)
                ->send(new InstructorForgotPassword(
                    $this->user,
                    $this->url
                ));
        }
        if ($this->name == "learner_forgot") {
            Mail::to($this->user->learner_email)
                ->send(new LearnerForgotPassword(
                    $this->user,
                    $this->url
                ));
        }
    }
}
