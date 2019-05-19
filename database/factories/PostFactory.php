<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->sentences(5, true),
        'body' => $faker->paragraphs(15, true),
    ];
});
