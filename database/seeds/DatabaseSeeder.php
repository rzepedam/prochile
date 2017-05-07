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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(TypeAssistanceTableSeeder::class);
        $this->call(AssistanceTableSeeder::class);
        $this->call(AttendanceTableSeeder::class);
    }
}
