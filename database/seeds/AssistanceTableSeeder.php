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
        factory('ProChile\Assistance', 10)->create();
    }
}
