<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        \ProChile\User::create([
            'role_id'      => 1,
            'first_name'   => 'Raúl',
            'male_surname' => 'Meza',
            'email'        => 'raulmeza@controlqtime.cl',
            'password'     => 'grupo@lfr@12'
        ]);
    }
}
