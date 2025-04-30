<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'duration' => $this->faker->numberBetween(10, 60),
            'course_id' => \App\Models\Course::factory(),
            'badge_id' => \App\Models\Badge::factory(),
        ];
    }
}
