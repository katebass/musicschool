<?php

use Faker\Generator as Faker;
use Faker\Provider\DateTime;

$factory->define(App\Solution::class, function (Faker $faker) {
    return [
        'student_id' => factory(App\Student::class)->create()->id,
        'assignment_id' => factory(App\Assignment::class)->create()->id,
        'description' => $faker->text(191),
        'audiofile' => "https://pbs.twimg.com/profile_images/921903322357002240/APAps6kX.jpg",
        'mark' => Null,
        'handover_date' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});
