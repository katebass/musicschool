<?php

use Faker\Generator as Faker;
use Faker\Provider\Base;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
    	'user_id' => factory(App\User::class)->create()->id,
        'grade' => $faker->numberBetween($min = 1, $max = 5) 
    ];
});
