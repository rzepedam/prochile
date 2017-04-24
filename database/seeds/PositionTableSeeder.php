<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->truncate();

        /*ProChile\Position::create([
            'name' => 'Asistente'
        ]);

        ProChile\Position::create([
            'name' => 'Director Nacional'
        ]);

        ProChile\Position::create([
            'name' => 'Director Regional'
        ]);

        ProChile\Position::create([
            'name' => 'Stand'
        ]);*/
    }
}
