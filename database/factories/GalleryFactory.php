<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'user_id' => $faker->numberBetween(1, 20),
        'description' => $faker->text
    ];
});
