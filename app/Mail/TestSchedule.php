<?php

namespace ProChile\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestSchedule extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    protected $users;

    /**
     * Create a new message instance.
     *
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.test');
    }
}
