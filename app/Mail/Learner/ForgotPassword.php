<?php

namespace App\Mail\Learner;

use App\Models\Learner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $learner;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Learner $learner, $url)
    {
        $this->learner = $learner;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.learner.forgot_password');
    }
}
