<?php

use Illuminate\Database\Seeder;
use \App\Models\TipCladire as TipCladire;

class TipCladireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate entries if exist to start from scratch
        TipCladire::truncate();
        $faker = \Faker\Factory::create();
        // Create random entries for our expenses table:
        $tipuri = [ 'bloc', 'casa'];
        $nr_tipuri = sizeof($tipuri);
        for ($i = 0; $i < $nr_tipuri; $i++) {
            TipCladire::create([
                'nume' => $tipuri[$i],
            ]);
        }
    }
}
