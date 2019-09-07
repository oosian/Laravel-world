<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Oosian\Contact\Models\State;
use Oosian\Contact\Models\Country as Country;

$factory->define(State::class, function (Faker $faker) use ($factory) {
    return [
        'name' => $faker->unique()->state,
        'locale' => $faker->locale,
        'country_id' => Country::all()->random()->id,
    ];
});