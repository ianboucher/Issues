<?php

use Faker\Generator as Faker;
use App\Test;
use App\Organisation;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'summary' => $faker->paragraph(5),
        'organisation_id' => Organisation::inRandomOrder()->first()->id,
    ];
});
