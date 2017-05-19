<?php

namespace ProChile\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Activity extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
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
        return $this->subject('Hoy en Enexpro')
                    ->markdown('emails.users.activities');
    }
}
