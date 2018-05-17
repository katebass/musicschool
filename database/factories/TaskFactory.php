<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'teacher_id' => factory(App\Teacher::class)->create()->id,
        'title' => $faker->text(190),
        'description' => $faker->text(),
        'audiofile' => $faker->"https://pbs.twimg.com/profile_images/921903322357002240/APAps6kX.jpg",
    ];
});
