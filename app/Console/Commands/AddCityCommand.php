<?php

namespace ProChile\Console\Commands;

use Carbon\Carbon;
use ProChile\City;
use Illuminate\Console\Command;

class AddCityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new City';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        City::create([
            'name' => "New City is added at: " . Carbon::now()
        ]);
    }
}
