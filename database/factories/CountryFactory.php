<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Oosian\Contact\Models\Country;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->country,
        'locale' => $faker->locale,
    ];
});