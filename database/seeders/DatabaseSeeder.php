<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();
        // $this->call(AdminTableSeeder::class);
        // $this->call(SocialLinksTableSeeder::class);
        // $this->call(MeetTableSeeder::class);
        // $this->call(WorkTableSeeder::class);
        // $this->call(ImageTableSeeder::class);
        $this->call(SeentableSeeder::class);
    }
}
