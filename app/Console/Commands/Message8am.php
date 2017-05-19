<?php

namespace ProChile\Console\Commands;

use ProChile\Assistance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Message8am extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mail-8-am';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail at 8:00am';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $assistances = Assistance::all();

        Mail::to($assistances)->send(new \ProChile\Mail\Message8am($assistances));
    }
}
