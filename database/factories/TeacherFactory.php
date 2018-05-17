<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'experience' => $faker->text(191),
    ];
});
