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

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Alimentos Funcionales y Gourmet',
            'acr'     => 'Ali. Fun. Gou.'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Carnes',
            'acr'     => 'Carnes',
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Madera y máquinas',
            'acr'     => 'Mad. y Máq.'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Productos del Mar: pescados, crustáceos, moluscos, algas',
            'acr'     => 'Prod. Mar'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Proveedores para el sector Agropecuario y Agroindustrial',
            'acr'     => 'Prov. Agro. y Agroind.'
        ]);

        ProChile\Industry::create([
            'city_id' => 2,
            'name'    => 'Industria Acuícola',
            'acr'     => 'Ind. Acuí.'
        ]);
    }
}
