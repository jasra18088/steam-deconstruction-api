<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Games;
use Faker\Generator as Faker;

$factory->define(Games::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'price' => $faker->randomDigit,
        'image' => $faker->imageUrl
    ];
});
