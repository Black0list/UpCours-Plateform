<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ['image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg'];
        $contents = ['content_1.pdf', 'content_2.pdf', 'content_3.pdf', 'content_4.pdf'];

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'image' => 'courses/images/' . $this->faker->randomElement($images),
            'content' => 'courses/contents/' . $this->faker->randomElement($contents),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'teacher_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }

}
