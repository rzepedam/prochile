<?php

namespace ProChile\Console\Commands;

use ProChile\User;
use Illuminate\Console\Command;

class GraphicsEvery15Minutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:graphics-every-15-minutes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to Directores with event assistance information';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereIn('role_id', [2, 3])->get(['email']);

        Mail::to($users)->send(new ProChile\Mail\TestSchedule($users));
    }
}
