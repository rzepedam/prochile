<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->truncate();

        if ( getenv('APP_ENV') === 'local' || getenv('APP_ENV') === 'production')
        {
            factory('ProChile\Attendance', 100)->create();
        }
    }
}
