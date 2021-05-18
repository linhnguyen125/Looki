<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            User::insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt(Str::random(10)),
                'remember_token' => Str::random(10),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
    }
}
