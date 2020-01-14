<?php

use Illuminate\Database\Seeder;
use App\Models\Cartiere as Cartiere;

class CartiereTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate entries if exist to start from scratch
        Cartiere::truncate();
        $faker = \Faker\Factory::create();
        // Create random entries for our expenses table:
        $cartiere = [ 'Zorilor', 'Marasti', 'Buna Ziua', 'Baciu', 'Manastur'];
        $nr_cartiere = sizeof($cartiere);
        for ($i = 0; $i < sizeof($nr_cartiere); $i++) {
            Cartiere::create([
                'name' => $cartiere[$nr_cartiere],
            ]);
        }
    }
}
