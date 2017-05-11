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

        if ( getenv('APP_ENV') === 'local' || getenv('APP_ENV') === 'production' )
        {
            $assistances = \ProChile\Assistance::get(['rut']);
            for ( $i = 0; $i < 207; $i++ )
            {
                factory('ProChile\Attendance')->create([
                    'id'  => $i + 1,
                    'rut' => $assistances[ $i ]->rut
                ]);
            }
        }
    }
}
