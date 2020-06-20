<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estimate;
use Faker\Generator as Faker;

$factory->define(Estimate::class, function (Faker $faker) {
    return [
        'course_id' => factory(\App\Course::class),
        'work_type_id' => factory(\App\WorkType::class),
        'customer_id' => factory(\App\Customer::class),
        'delivery_date' => $faker->date(),
        'delivery_hour' => $faker->time(),
        'description' => $faker->text,
        'theme' => $faker->word,
        'sheets_number' => $faker->word,
        'standard' => $faker->word,
        'other_course' => $faker->word,
        'other_work_type' => $faker->word,
    ];
});
