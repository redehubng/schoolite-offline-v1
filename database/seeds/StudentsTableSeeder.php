<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    for($i = 0; $i<250; $i++) {
        $gender = [];
        $gender[0] = 'Male';
        $gender[1] = 'Female';

        $user = new \App\User;

        $user->username = generate_student_admin_number(\App\Session::where('status', '=', 'active')->first()->name);

        $user->password = bcrypt('password');

        $user->save();

        $user->addRole(\App\Role::where('name', '=', 'student')->first()->id);


        $faker = Faker\Factory::create();


        $student = App\Student::create([
            'name' => $faker->name,
            'user_id' => $user->id,
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'dob' => \Carbon\Carbon::createFromFormat('m/d/Y', $faker->date('m/d/Y')),
            'date_admitted' => \Carbon\Carbon::createFromFormat('m/d/Y', $faker->date('m/d/Y')),
            'admin_number' => $user->username,
            'address' => $faker->address,
            'comment' => $faker->text,
            'sex' => $gender[rand(0, 1)],
            'country_id' => 1,
            'state_id' => 5,
            'lga_id' => 1,
            'house_id' => rand(1, 4),
            'classroom_id' => rand(1, 18),
            'starting_classroom_id' => rand(1, 2),
            'guardian_id' => rand(1, 8)
        ]);

        $user->addRole(\App\Role::where('name', '=', 'student')->first()->id);
    }
    }
}
