<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'subject_id' => $faker->bankAccountNumber,
        'subject_name' => $faker->name,
        'credit' => $faker->numberBetween(1,8),
        'teacher_id' => factory('App\Models\TeacherInfo')->create()->teacher_id,
        'subject_type_id' => factory('App\Models\SubjectType')->create()->subject_type_id,
        'start_time' => $faker->time('H:i:s'),
        'end_time' => $faker->time('H:i:s'),
    ];
});
