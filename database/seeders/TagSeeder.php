<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Project;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    

    Tag::create([
        'name' => 'PHP',
        'slug' => 'php',
    ]);
    Tag::create([
        'name' => 'Laravel',
        'slug' => 'laravel',
    ]);
    Tag::create([
        'name' => 'Node.js',
        'slug' => 'Node.js',
    ]);
        //
    }
}
