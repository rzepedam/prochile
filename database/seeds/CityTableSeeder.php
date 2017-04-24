<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();

        /*ProChile\City::create([
            'name' => 'Antofagasta'
        ]);

        ProChile\City::create([
            'name' => 'Viña del Mar'
        ]);

        ProChile\City::create([
            'name' => 'Valparaíso'
        ]);

        ProChile\City::create([
            'name' => 'Puerto Varas'
        ]);*/
    }
}
