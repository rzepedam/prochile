<?php

namespace ProChile\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use ProChile\User;

class SignUp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $password;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param $password
     * @param User $user
     */
    public function __construct($password, User $user)
    {
        $this->password = $password;
        $this->user     = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.sign_up');
    }
}
