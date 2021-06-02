<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => Order::all()->random()->id,
        'product_id' => Product::all()->random()->id,
        'qty' => $faker->numberBetween($min = 1, $max = 25),
        'discount' => $faker->numberBetween($min = 1, $max = 99),
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Asia/Ho_Chi_Minh'),
        'updated_at' => now(),
    ];
});
