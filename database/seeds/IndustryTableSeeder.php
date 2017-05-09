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
            'city_id' => 1,
            'name'    => 'Compañías Mineras',
            'acr'     => 'Com. Min.'
        ]);

        ProChile\Industry::create([
            'city_id' => 1,
            'name'    => 'Empresas locales proveedoras de la minería',
            'acr'     => 'Emp. Prov. Min.'
        ]);

        ProChile\Industry::create([
            'city_id' => 1,
            'name'    => 'Servicios profesionales: Proveedores para la Construcción',
            'acr'     => 'Serv. Prof.'
        ]);

        ProChile\Industry::create([
            'city_id' => 1,
            'name'    => 'Servicios para la Ingeniería',
            'acr'     => 'Serv. Ing.'
        ]);
    }
}
