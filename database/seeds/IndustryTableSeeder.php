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
            'name'    => 'Compañías Mineras'
        ]);

        ProChile\Industry::create([
            'city_id' => 1,
            'name'    => 'Empresas locales proveedoras de la minería'
        ]);

        ProChile\Industry::create([
            'city_id' => 1,
            'name'    => 'Servicios profesionales: Proveedores para la Construcción'
        ]);

        ProChile\Industry::create([
            'city_id' => 1,
            'name'    => 'Servicios para la Ingeniería'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Alimentos Funcionales y Gourmet'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Carnes'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Madera y máquinas'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Productos del Mar: pescados, crustáceos, moluscos, algas'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Proveedores para el sector Agropecuario y Agroindustrial'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Industria Acuícola'
        ]);
    }
}
