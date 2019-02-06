<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'title' => $faker->streetName,
        'desc' => $faker->text,
        'camera' => $faker->state,
        'category' => $faker->word,
        'file_name' => $faker->imageUrl,
        'user_id' => factory('App\User')->create()->id,
    ];
});
