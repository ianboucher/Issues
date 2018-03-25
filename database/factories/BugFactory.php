<?php

use Faker\Generator as Faker;
use App\Bug;
use App\Organisation;

$factory->define(Bug::class, function (Faker $faker) {
    return [
        'heading' => $faker->sentence(5),
        'content' => $faker->paragraph(5),
        'organisation_id' => Organisation::inRandomOrder()->first()->id,
    ];
});
