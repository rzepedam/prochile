<?php

use Illuminate\Database\Seeder;

class AssistanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assistances')->truncate();

        if ( getenv('APP_ENV') === 'local' || getenv('APP_ENV') === 'production')
        {
            factory('ProChile\Assistance', 10)->create();
        }
    }
}
