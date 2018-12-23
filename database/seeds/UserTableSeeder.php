<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->photos()->save(factory(App\Photo::class)->make());
        });
        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->comments()->save(factory(App\Comment::class)->make());
        });

        //factory(App\User::class, 10)->create();
    }
}
