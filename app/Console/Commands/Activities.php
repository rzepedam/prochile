<?php

namespace ProChile\Console\Commands;

use ProChile\Assistance;
use ProChile\Mail\Activity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Activities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:activity-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send List activities 11:30am';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $assistances = Assistance::where('rut', '17032680-6')->firstOrFail();

        Mail::to($assistances)->send(new Activity($assistances));
    }
}
