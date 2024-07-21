<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
