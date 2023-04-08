<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->realText(64),
            'slug' => $this->faker->unique()->realText(60),
            'body' => $this->faker->realText(900),
            'category_id'=> Category::inRandomOrder()
                ->limit(1)->first()->id,
            'view' => rand(0, 1000),
        ];
    }
}
