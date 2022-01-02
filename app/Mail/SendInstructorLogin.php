<?php

namespace App\Mail;

use App\Models\Instructor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
class SendInstructorLogin extends Mailable
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
        return $this->subject('Access Instructor Credentails')->markdown('mails.send_instructor_login');
    }
}
