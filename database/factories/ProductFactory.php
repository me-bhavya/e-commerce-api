<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "price" => $faker->numberBetween(500, 10000),
        "detail" => $faker->paragraph,
        "stock" => $faker->randomDigit,
        "discount" => $faker->numberBetween(5, 40)
    ];
});
