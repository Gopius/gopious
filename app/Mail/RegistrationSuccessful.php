<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Organization;

class RegistrationSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $organization;
    public $verify;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.registration_success');
    }
}
