<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'body' => $faker->paragraph
    ];
});
