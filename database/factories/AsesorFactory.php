<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Asesor;
use Faker\Generator as Faker;

$factory->define(Asesor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mobile' => $faker->word,
        'specialty' => $faker->word,
        'mail' => $faker->word,
        'observation' => $faker->word,
    ];
});
