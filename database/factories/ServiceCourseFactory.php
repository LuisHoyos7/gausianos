<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceCourse;
use Faker\Generator as Faker;

$factory->define(ServiceCourse::class, function (Faker $faker) {
    return [
        'course_id' => factory(\App\Course::class),
        'service_id' => factory(\App\Service::class),
        'name' => $faker->name,
    ];
});
