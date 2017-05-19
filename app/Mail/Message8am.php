<?php

namespace ProChile\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Message8am extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Assistance
     */
    protected $assistances;

    /**
     * Create a new message instance.
     *
     * @param $assistances
     */
    public function __construct($assistances)
    {
        $this->assistances = $assistances;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Acreditación Enexpro')
                    ->markdown('emails.users.8am');
    }
}
