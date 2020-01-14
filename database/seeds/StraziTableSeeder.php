<?php

use Illuminate\Database\Seeder;
use App\Models\Strazi as Strazi;
use App\Models\Cartiere as Cartiere;

class StraziTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate entries if exist to start from scratch
        Strazi::truncate();
        $faker = \Faker\Factory::create();

        $id_cartiere = Cartiere::where('id' ,'>' ,0)->pluck('id');

        foreach ($id_cartiere as $id_cartier){
            for ($i = 0; $i < 10; $i++) {
                Strazi::create([
                    'nume_strada' => $faker->streetName,
                    'id_cartier' => $id_cartier,
                    'id_tip_strada'=> $faker->numberBetween(1,3),
                    'nr_cladiri' => $faker->numberBetween(5,10)
                ]);
            }
        }
    }
}
