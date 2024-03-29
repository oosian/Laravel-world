<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Oosian\LaravelWorld\Models\City;
use Oosian\LaravelWorld\Models\State;

$factory->define(City::class, function (Faker $faker) use ($factory) {
    return [
        'name' => $faker->unique()->city,
        'locale' => $faker->locale,
        'state_id' => State::all()->random()->id,
    ];
});