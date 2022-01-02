<?php

namespace App\Mail\Instructor;

use App\Models\Instructor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $instructor;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Instructor $instructor, $url)
    {
        $this->instructor = $instructor;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.instructor.forgot_password');
    }
}
