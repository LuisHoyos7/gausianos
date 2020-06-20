<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WorkType;
use Faker\Generator as Faker;

$factory->define(WorkType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'service_type_id' => factory(\App\ServiceType::class),
    ];
});
