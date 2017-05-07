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
            'acr'  => 'cqtime',
            'name' => 'Controlqtime'
        ]);

        \ProChile\Role::create([
            'acr'  => 'dir_nac',
            'name' => 'Director Nacional'
        ]);

        \ProChile\Role::create([
            'acr'  => 'dir_reg',
            'name' => 'Director Regional'
        ]);

        \ProChile\Role::create([
            'acr'  => 'staff',
            'name' => 'Staff'
        ]);
    }
}
