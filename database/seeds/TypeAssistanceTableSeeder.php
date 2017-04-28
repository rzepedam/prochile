<?php

use Illuminate\Database\Seeder;

class TypeAssistanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_assistances')->truncate();

        ProChile\TypeAssistance::create([
            'name' => 'Comprador',
        ]);

        ProChile\TypeAssistance::create([
            'name' => 'Buyer',
        ]);

        ProChile\TypeAssistance::create([
            'name' => 'Exportador',
        ]);
    }
}
