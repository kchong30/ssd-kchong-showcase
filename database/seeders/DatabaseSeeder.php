<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // populate categories and projects table with seed data
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            ProjectSeeder::class,
            ProjectTagsSeeder::class
        ]);
    }
}
