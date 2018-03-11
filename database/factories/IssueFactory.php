<?php

use Faker\Generator as Faker;
use App\Issue;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->paragraph(5),
        'severity' => $faker->numberBetween(0, 100),
    ];
});
