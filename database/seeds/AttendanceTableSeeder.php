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
            $assistances = \ProChile\Assistance::get(['id', 'rut']);

            foreach ( $assistances as $assistance )
            {
                $date = mt_rand(\Carbon\Carbon::createFromTime('08', '30', '00')->timestamp, \Carbon\Carbon::createFromTime('09', '30', '00')->timestamp);
                \ProChile\Attendance::create([
                    'assistance_id' => $assistance->id,
                    'rut'           => $assistance->rut,
                    'created_at'    => \Carbon\Carbon::createFromFormat('U', $date)->setTimezone("America/Santiago")
                ]);
            }
        }
    }
}
