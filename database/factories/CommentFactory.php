<?php

use Faker\Generator as Faker;

/* @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(rand(20, 60)),
        //'user_id' => factory('App\User')->create()->id,
        //'photo_id' => factory('App\Photo')->create()->id,
    ];
});
