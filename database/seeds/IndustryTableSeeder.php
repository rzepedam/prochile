<?php

use Illuminate\Database\Seeder;

class IndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->truncate();

        ProChile\Industry::create([
            'name'    => 'Alimentos',
            'acr'     => 'Alim.'
        ]);

        ProChile\Industry::create([
            'name'    => 'Industria',
            'acr'     => 'Ind.'
        ]);

        ProChile\Industry::create([
            'name'    => 'Industrias Creativas',
            'acr'     => 'Ind. Creat.'
        ]);

        ProChile\Industry::create([
            'name'    => 'Servicios',
            'acr'     => 'Serv.'
        ]);
    }
}
