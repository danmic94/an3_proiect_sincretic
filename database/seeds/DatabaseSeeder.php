<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CartiereTableSeeder::class);
//        $this->call(TipStradaTableSeeder::class);
//        $this->call(TipCladireTableSeeder::class);
//        $this->call(StraziTableSeeder::class);
//        $this->call(CladiriTableSeeder::class);
    }
}
