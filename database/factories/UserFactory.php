<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photos = ['avatar_1.png', 'avatar_2.png', 'avatar_3.png', 'user.png'];
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'photo' => 'icons/' . $this->faker->randomElement($photos),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'isPending' => $this->faker->boolean(30),
            'role_id' => \App\Models\Role::factory(),
        ];
    }



    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
