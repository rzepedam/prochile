<?php

namespace ProChile\Notifications;

use ProChile\Assistance;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class WelcomeSMS extends Notification
{
    use Queueable;

    /**
     * @var Assistance
     */
    public $assistance;

    /**
     * Create a new notification instance.
     *
     * @param Assistance $assistance
     */
    public function __construct(Assistance $assistance)
    {
        $this->assistance = $assistance;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
            ->content('ProChile le da la mas cordial bienvenida a Enexpro 2017: Encuentro exportador de Chile para el mundo');

    }
}
