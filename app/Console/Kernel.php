<?php

namespace ProChile\Console;

use ProChile\Console\Commands\ByeSMS;
use ProChile\Console\Commands\Message8am;
use Illuminate\Console\Scheduling\Schedule;
use ProChile\Console\Commands\AddCityCommand;
use ProChile\Console\Commands\GraphicsEvery15Minutes;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        GraphicsEvery15Minutes::class, ByeSMS::class, Message8am::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
