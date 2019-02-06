<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'user_id' => factory('App\User')->create()->id,
        'photo_id' => factory('App\Photo')->create()->id,
    ];
});
