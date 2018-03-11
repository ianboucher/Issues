<?php

use Faker\Generator as Faker;
use App\Organisation;

$factory->define(Organisation::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
    ];
});
