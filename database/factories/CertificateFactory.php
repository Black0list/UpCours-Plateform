<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'certificate_number' => strtoupper($this->faker->bothify('CERT-####')),
            'student_id' => \App\Models\User::factory(),
            'course_id' => \App\Models\Course::factory(),
        ];
    }

}
