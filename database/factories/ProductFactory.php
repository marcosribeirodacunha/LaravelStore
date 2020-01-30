<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1,7),
        'name' => $faker->unique()->sentence(random_int(2,5)),
        'price' => (rand(1,10000) / 10),
        'description' => $faker->paragraph(random_int(0, 10)),
        'units_in_stock' => random_int(0, 200),
        'active' => random_int(0,1)
    ];
});
