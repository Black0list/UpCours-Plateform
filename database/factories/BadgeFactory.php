<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Badge>
 */
class BadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $icons = ['badge1.png', 'badge2.png', 'badge3.png'];
        return [
            'badge_name' => $this->faker->word,
            'icon' => 'badges/' . $this->faker->randomElement($icons),
        ];
    }



}
