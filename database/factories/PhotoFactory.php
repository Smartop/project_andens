<?php

use Faker\Generator as Faker;

/* @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Andens\Models\Photo::class, function (Faker $faker) {
    return [
        'title' => $faker->streetName,
        'desc' => $faker->text,
        'camera' => $faker->state,
        'category' => $faker->word,
        'file_name' => $faker->imageUrl,
        //'user_id' => factory('Andens\Models\User')->create()->id,
    ];
});
