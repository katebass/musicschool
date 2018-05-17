<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'teacher_id' => factory(App\Teacher::class)->create()->id,
        'title' => $faker->text(190),
        'description' => $faker->text(191),
        'audiofile' => asset('storage/mozart.mp3')
    ];
});
