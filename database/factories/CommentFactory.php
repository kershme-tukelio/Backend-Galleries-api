<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 20),
        'gallery_id' => $faker->numberBetween(1, 20),
        'content' => $faker->text
    ];
});
