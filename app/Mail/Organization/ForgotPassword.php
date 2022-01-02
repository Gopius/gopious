<?php

namespace App\Mail\Organization;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Organization;

class ForgotPassword extends Mailable
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
        return $this->markdown('mails.organization.forgot_password');
    }
}
