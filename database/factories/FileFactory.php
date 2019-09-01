<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\File;
use App\User;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    static $fileInstanceIncrement = 0;

    $fileInstanceIncrement++;
    $fileName = "my_test_file_{$fileInstanceIncrement}.png";

    return [
        'user_id' => User::all()->random()->id,
        'original_name' => $fileName,
        'name' => $fileName,
        'path' => "/public/storage/{$fileName}",
        'size' => round(1 + mt_rand() / mt_getrandmax() * (99999999 - 1), 2),
        'mime' => 'image/png',
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});
