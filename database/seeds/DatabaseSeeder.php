<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PositionTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(TypeAssistanceTableSeeder::class);
        $this->call(AssistanceTableSeeder::class);
    }
}
