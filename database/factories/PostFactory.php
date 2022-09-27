<?php

namespace Database\Factories;

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
          "title" =>fake()->sentence(),
          "content" => fake()->paragraph(8),
          "url_img" => fake()->imageUrl(640, 480, 'animals', true),
          "created_at" => now(),
        ];
    }
}
