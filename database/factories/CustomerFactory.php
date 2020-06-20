<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mail' => $faker->word,
        'mobile' => $faker->numberBetween(-10000, 10000),
        'user_id' => factory(\App\User::class),
    ];
});
