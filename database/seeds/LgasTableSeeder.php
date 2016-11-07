<?php

use Illuminate\Database\Seeder;

class LgasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $states = fopen(storage_path('app/states.txt'), 'r') or die('cant open');

        $states_list = [];

        while(!feof($states)){
            $states_list[] = trim(fgets($states));
        }

        $lgas = fopen(storage_path('app/lgas.txt'), 'r') or die('cant open');

        $lgas_list = [];

        while(!feof($lgas)){
            $lgas_list[] = trim(fgets($lgas));
        }


        for($i = 0; $i < count($lgas_list); $i++){

            $lga = new \App\Lga;

            $lga->name = $lgas_list[$i];

            $lga->state_id = \App\State::where('name', '=', $states_list[$i])->first()->id;

            $lga->is_capital = 0;

            $lga->save();

        }
    }
}
