<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/* @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Andens\Models\User::class, function (Faker $faker) {
    return [
        'nickname' => $faker->unique()->userName,
        'real_name' => $faker->name,
        'bio' => $faker->text,
        'avatar' => $faker->imageUrl(250, 250, 'people', true, 'Faker'),
        'country' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
