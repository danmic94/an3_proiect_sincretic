<?php

use Illuminate\Database\Seeder;
use \App\Models\TipStrada as TipStrada;

class TipStradaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate entries if exist to start from scratch
        TipStrada::truncate();
        $faker = \Faker\Factory::create();
        // Create random entries for our expenses table:
        $tipuri = [ 'bulevard', 'strada', 'piata'];
        $nr_tipuri = sizeof($tipuri);
        for ($i = 0; $i < $nr_tipuri; $i++) {
            TipStrada::create([
                'nume' => $tipuri[$i],
            ]);
        }
    }
}
