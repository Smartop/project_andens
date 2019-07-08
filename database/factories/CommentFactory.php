<?php

use Faker\Generator as Faker;

/* @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Andens\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(rand(20, 60)),
        //'user_id' => factory('Andens\User')->create()->id,
        //'photo_id' => factory('Andens\Photo')->create()->id,
    ];
});
