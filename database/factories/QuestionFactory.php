<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // title content author
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'tag_id' => fake()->numberBetween(1, 10),
            'body' => fake()->text(500),
            'user_id' => fake()->numberBetween(1, 10),
            'votes' => fake()->numberBetween(-3, 10),
            'answers' => fake()->numberBetween(0, 10),
            'views' => fake()->numberBetween(0, 10)
        ];
    }
}
