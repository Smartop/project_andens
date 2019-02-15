<?php

use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $posts->each(function($post) {
        //     factory('App\Comment', 10)->create(['post_id' => $post->id]);
        // });
        $r = 0 . '-' . 10;
        $commentRange = $this->command->ask('How many comments per photo do you need ?', $r);

        $photos = App\Photo::all();

        $this->command->info("Creating a range of {$commentRange} comments for {$photos->count()} photos .");

        $photos->each(function ($photo) use ($commentRange) {
            factory(App\Comment::class, 3)
                ->create([
                    'photo_id' => $photo->id,
                    'user_id' => App\User::all()->random()->id,
                ]);
        });

    }
}
