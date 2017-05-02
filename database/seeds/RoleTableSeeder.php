<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        \ProChile\Role::create([
            'name' => 'Controlqtime'
        ]);

        \ProChile\Role::create([
            'name' => 'Director Nacional'
        ]);

        \ProChile\Role::create([
            'name' => 'Director Regional'
        ]);

        \ProChile\Role::create([
            'name' => 'Staff'
        ]);
    }
}
