<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Pai Zay',
            'email' => 'pzo@gmail.com',
            'password' => Hash::make('pzo123123')
        ]);

       $categories = [
            'Technology',
            'Health',
            'Travel',
            'Food',
            'Lifestyle',
            'Education',
            'Finance',

        ];

        foreach($categories as $category){
            Category::factory()->create([
                'title' => $category ,
                'slug' => Str::slug($category,'-'),
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        };

        $title = fake()->sentence(10);
        $description = fake()->realText(200);

        Post::factory(100)->create(
            [
            'title' =>$title,
            'slug'  => Str::slug($title,'-'),
            'description' => $description ,
            'excerpt' => Str::words($description, 50, '.....'),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id
            ]
        );
    }
}
