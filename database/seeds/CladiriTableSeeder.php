<?php

use Illuminate\Database\Seeder;
use App\Models\Cladiri as Cladiri;
use App\Models\Strazi;

class CladiriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate entries if exist to start from scratch
        Cladiri::truncate();
        $faker = \Faker\Factory::create();

        $id_strazi = Strazi::where('id' ,'>' ,0)->pluck('id');

        foreach ($id_strazi as $id_strada){
            for ($i = 0; $i < 10; $i++) {
                $rand_id_tip_cladire = $faker->numberBetween(1,2);
                $nr_apartamente = $rand_id_tip_cladire === 1 ? $faker->numberBetween(4,24) : 1;
                Cladiri::create([
                    'numar_cladire' => $faker->numberBetween(1,1000),
                    'id_tip_cladire' => $faker->numberBetween(1,2),
                    'nr_apartamente' => $nr_apartamente,
                    'id_strada' => $id_strada,
                    'cod_postal' => $faker->postcode
                ]);
            }
        }
    }
}
