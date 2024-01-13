<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Category::factory(3)->create();

        Post::factory(10)->create();

        PostCategory::factory(20)->create();

        User::factory(1)->create();
    }
}
