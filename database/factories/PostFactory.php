<?php
namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->sentence(10); // Ensure a new sentence each time
        $description = $this->faker->realText(2000); // Ensure a new description each time

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => $description,
            'excerpt' => Str::words($description, 50, '.....'),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}

