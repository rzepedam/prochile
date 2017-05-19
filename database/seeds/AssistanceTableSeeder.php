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

        if ( getenv('APP_ENV') === 'local')
        {
            factory('ProChile\Assistance', 10)->create();
        }
    }
}
