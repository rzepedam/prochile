<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();

        /*ProChile\Country::create([
            'name' => 'Argentina'
        ]);

        ProChile\Country::create([
            'name' => 'Bolivia'
        ]);

        ProChile\Country::create([
            'name' => 'Chile'
        ]);

        ProChile\Country::create([
            'name' => 'Colombia'
        ]);

        ProChile\Country::create([
            'name' => 'Ecuador'
        ]);

        ProChile\Country::create([
            'name' => 'Paraguay'
        ]);

        ProChile\Country::create([
            'name' => 'Perú'
        ]);

        ProChile\Country::create([
            'name' => 'Uruguay'
        ]);

        ProChile\Country::create([
            'name' => 'Venezuela'
        ]);*/
    }
}
