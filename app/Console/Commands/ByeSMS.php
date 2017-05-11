<?php

namespace ProChile\Console\Commands;

use ProChile\Assistance;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notification;

class ByeSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:bye-sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms at 18:45 hrs.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $assistances = Assistance::all();

        Notification::send($assistances, new \ProChile\Notifications\ByeSMS());
    }
}
