<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        Eloquent::unguard();
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding?')) 
        {
            $this->command->call('migrate:fresh');
            $this->command->line("Database cleared.");
        }

        $this->call(UserTableSeeder::class);
        $this->call(PostCommentSeeder::class);

        $this->command->info("Database seeded.");

        // Re Guard model
        Eloquent::reguard();

    }
}
