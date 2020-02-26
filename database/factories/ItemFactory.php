<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'item_name' => $faker->sentence(2),
        'category_id' => $faker->numberBetween(1,3),
        'price' => $faker->numberBetween(1000,300000),
        'tag' => $faker->sentence(2),
        'item_image' => $faker->sentence(2),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
