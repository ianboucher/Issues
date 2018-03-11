<?php

use Faker\Generator as Faker;
use App\Issue;
use App\User;
use App\Organisation;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->paragraph(5),
        'severity' => $faker->numberBetween(0, 100),
        'user_id' => User::inRandomOrder()->first()->id,
        'organisation_id' => Organisation::inRandomOrder()->first()->id,
    ];
});
