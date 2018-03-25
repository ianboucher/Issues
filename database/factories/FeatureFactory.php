<?php

use Faker\Generator as Faker;
use App\Feature;
use App\Organisation;

$factory->define(App\Feature::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'description' => $faker->paragraph(5),
        'organisation_id' => Organisation::inRandomOrder()->first()->id,
    ];
});
