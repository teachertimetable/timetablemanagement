<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubjectType;
use Faker\Generator as Faker;

$factory->define(SubjectType::class, function (Faker $faker) {
    return [
        'subject_type_id' => $faker->uuid,
        'subject_describe' => $faker->text,
        'subject_type' => $faker->creditCardType,
    ];
});
