<?php

namespace ProChile\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportFor15Min extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    protected $users;

    /**
     * Create a new message instance.
     *
     * @param $users
     */
    public function __construct($users)
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
        return $this->subject('Informativo Enexpro')
                    ->markdown('emails.users.report_for_15_min');
    }
}
