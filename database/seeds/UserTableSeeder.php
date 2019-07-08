<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = (int) $this->command->ask('How many users do you need ?', 10);
        $r = 0 . '-' . 10;
        $photoRange = $this->command->ask('How many photos per user do you need ?', $r);
        $this->command->info("Creating {$userCount} users each having a photo range of {$photoRange}.");

        $users = factory(Andens\User::class, 6)->create();

        // Create a range of photos for each users
        $users->each(function ($user) use ($userCount) {
            factory(Andens\Photo::class, 6)
                ->create(['user_id' => $user->id]);
        });

        // factory(Andens\User::class, 10)->create()->each(function ($user) {
        //     $user->photos()->save(factory(Andens\Photo::class)->make());
        // });
        //-----
        // factory(Andens\User::class, 5)->create()->each(function ($user) {
        //     $user->comments()->save(factory(Andens\Comment::class)->make());
        // });

        //factory(Andens\User::class, 10)->create();
    }
    //     public function count($range)
    // {
    //     return $range;
    // }
}
