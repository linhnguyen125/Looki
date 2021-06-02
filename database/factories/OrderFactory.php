<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_code' => 'LKI-' . Str::random(8),
        'user_id' => User::all()->random()->id,
        'user_name' => User::all()->random()->name,
        'total' => $faker->numberBetween($min = 10000, $max = 10000000),
        'status' => $faker->randomElement($array = array ('processing','in transit','success', 'fail')),
        'address' => $faker->address,
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Asia/Ho_Chi_Minh'),
        'updated_at' => now(),
    ];
});
