<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(55, 105),
            'game' => $this->faker->randomElement(['Before Silence', 'Gravity Jump']),
            'type' => $this->faker->randomElement(['Bug Reports', 'Suggestions', 'Experience Feedback']),
            'title' => $this->faker->sentence,
            'feedback' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
