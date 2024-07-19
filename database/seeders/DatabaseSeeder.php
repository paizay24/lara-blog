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

        Post::factory(100)->create();




    }
}
