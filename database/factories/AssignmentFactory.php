<?php

use Faker\Generator as Faker;
Faker\Provider\DateTime;

$factory->define(App\Assignment::class, function (Faker $faker) {
    return [
        'group_id' => factory(App\Group::class)->create()->id,
        'task_id' => factory(App\Task::class)->create()->id,
        'assignment_date' => $faker->dateTime($max = 'now', $timezone = null),
        'deadline' => dateTime($max = 'now', $timezone = null)

    ];
});
