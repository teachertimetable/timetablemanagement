<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TeacherInfo;
use Faker\Generator as Faker;

$factory->define(TeacherInfo::class, function (Faker $faker) {
    return [
        'teacher_id' => $faker->unique()->numberBetween (14150,29225),
        'teacher_name' => $faker->name,
        'teacher_pic_src' => $faker->url,
        'teacher_email' => $faker->email,
        'teacher_tel' => $faker->phoneNumber,
    ];
});
