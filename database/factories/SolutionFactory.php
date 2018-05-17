<?php

use Faker\Generator as Faker;

$factory->define(App\Solution::class, function (Faker $faker) {
    return [
        'student_id' => factory(App\Teacher::class)->create()->id,
        'assignment_id' => factory(App\Teacher::class)->create()->id,
        'description' => $faker->text(),
        'audiofile' => $faker->"https://pbs.twimg.com/profile_images/921903322357002240/APAps6kX.jpg",
        'mark' => Null;
    ];
});
