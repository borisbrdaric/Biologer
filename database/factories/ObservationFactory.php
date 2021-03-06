<?php

use Faker\Generator as Faker;

$factory->define(App\FieldObservation::class, function (Faker $faker) {
    return [
        'license' => App\License::firstId(),
        'taxon_suggestion' => 'Cerambyx cerdo',
        'found_dead' => $faker->boolean,
        'found_dead_note' => $faker->sentence,
        'time' => '11:00',
    ];
});

$factory->define(App\Observation::class, function (Faker $faker) {
    static $userId;

    return [
        'year' => date('Y'),
        'month' => date('m'),
        'day' => date('d'),
        'location' => $faker->city,
        'latitude' => 44.44444,
        'longitude' => 21.11111,
        'mgrs10k' => '38QMJ43',
        'approved_at' => Carbon\Carbon::yesterday(),
        'created_by_id' => function () use ($userId) {
            return $userId ?: $userId = factory(App\User::class)->create()->id;
        },
        'observer' => $faker->name,
        'identifier' => $faker->name,
    ];
});

$factory->state(App\Observation::class, 'unapproved', function (Faker $faker) {
    return [
        'approved_at' => null,
    ];
});
