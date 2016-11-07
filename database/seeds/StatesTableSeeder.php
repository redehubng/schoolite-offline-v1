<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = \App\Country::where('name', '=', 'Nigeria')->firstOrFail();

        $states = fopen(storage_path('app/states.txt'), 'r') or die('cant open');

        $states_list = [];

        while(!feof($states)){

            $states_list[] = trim(fgets($states));
        }

        fclose($states);


        $states_list = array_unique($states_list);
        sort($states_list);



        foreach($states_list as $state){
            DB::table('states')->insert([
                'name' => $state,
                'country_id' => $country->id,
                'is_capital' => $state == 'FCT' ? 1 : 0
            ]);
        }

    }
}
