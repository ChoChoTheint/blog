<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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
        // User::truncate();
        // Blog::truncate();
        // Category::truncate();

        // $frontend=Category::factory()->create(['name'=>'frontend']);
        // $backend=Category::factory()->create(['name'=>'backend']);

        // Blog::factory(2)->create(['category_id'=>$frontend->id]);
        // Blog::factory(2)->create(['category_id'=>$backend->id]);
        // User::truncate();
        // Blog::truncate();
        // Category::truncate();

        // $frontend=Category::factory()->create(['name'=>'frontend']);
        // $backend=Category::factory()->create(['name'=>'backend']);

        // Blog::factory(2)->create(['category_id'=>$frontend->id]);
        // Blog::factory(2)->create(['category_id'=>$backend->id]);
        \App\Models\Blog::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $category = Category::create([
        //     'name' => 'Frontend',
        //     'slug' => 'frontend'
        // ]);
        // Blog::create([
        //     'title' => 'my first blog',
        //     'slug' => 'my-first-blog',
        //     'body' => 'lorem',
        //     'category-id' => $category->id
        // ]);
    }
}
