<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        \App\Models\Role::insert([
            ['role_name' => 'admin'],
            ['role_name' => 'teacher'],
            ['role_name' => 'student'],
        ]);

        // Categories
        $categories = collect();
        for ($i = 0; $i < 5; $i++) {
            $categories->push(\App\Models\Category::create([
                'name' => fake()->jobTitle(),
                'description' => fake()->sentence(),
            ]));
        }

        // Tags
        $tags = collect();
        for ($i = 0; $i < 10; $i++) {
            $tags->push(\App\Models\Tag::create([
                'name' => fake()->jobTitle(),
            ]));
        }

        // Teachers
        $teachers = collect();
        $pics = ['avatar_1.png', 'avatar_2.png', 'avatar_3.png', 'user.png'];
        for ($i = 0; $i < 5; $i++) {
            $teachers->push(\App\Models\User::create([
                'firstname' => fake()->firstName(),
                'lastname' => fake()->lastName(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->unique()->safeEmail(),
                'photo' => 'icons/' . fake()->randomElement($pics),
                'password' => bcrypt('password'),
                'isPending' => false,
                'role_id' => 2, // teacher
            ]));
        }

        // Students
        $students = collect();
        for ($i = 0; $i < 20; $i++) {
            $students->push(\App\Models\Student::create([
                'firstname' => fake()->firstName(),
                'lastname' => fake()->lastName(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->unique()->safeEmail(),
                'photo' => 'icons/' . fake()->randomElement($pics),
                'password' => bcrypt('password'),
                'isPending' => false,
                'role_id' => 3, // student
            ]));
        }

        // Courses
        $courses = collect();
        $images = ['image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg'];
        $contents = ['content_1.pdf', 'content_2.pdf', 'content_3.pdf', 'content_4.pdf'];

        foreach (range(1, 10) as $_) {
            $course = \App\Models\Course::create([
                'title' => fake()->sentence(3),
                'description' => fake()->paragraph(),
                'image' => 'courses/images/' . fake()->randomElement($images),
                'content' => 'courses/contents/' . fake()->randomElement($contents),
                'price' => fake()->randomFloat(2, 0, 100),
                'teacher_id' => $teachers->random()->id,
                'category_id' => $categories->random()->id,
            ]);
            $courses->push($course);

            // Attach 1–3 tags per course
            $course->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }

        // Enroll students in 1–3 courses
        foreach ($students as $student) {
            $student->courses()->attach($courses->random(rand(1, 3))->pluck('id')->toArray());
        }

        // Badges
        $badges = collect();
        $icons = ['badge_1.png', 'badge_2.png', 'badge_3.png', 'badge_4.png'];
        for ($i = 0; $i < 5; $i++) {
            $badges->push(\App\Models\Badge::create([
                'badge_name' => fake()->word(),
                'icon' => 'badges/' . fake()->randomElement($icons),
            ]));
        }

        // Quizzes + Questions + Choices
        $quizzes = collect();
        foreach ($courses as $course) {
            $quiz = \App\Models\Quiz::create([
                'title' => fake()->sentence(2),
                'duration' => rand(10, 60),
                'course_id' => $course->id,
                'badge_id' => $badges->random()->id,
            ]);
            $quizzes->push($quiz);

            foreach (range(1, 3) as $_) {
                $question = \App\Models\Question::create([
                    'title' => fake()->sentence(6),
                    'quiz_id' => $quiz->id,
                ]);

                $correctIndex = rand(1, 4);
                foreach (range(1, 4) as $i) {
                    \App\Models\Choice::create([
                        'question_id' => $question->id,
                        'text' => fake()->sentence(3),
                        'is_correct' => $i === $correctIndex,
                    ]);
                }
            }
        }

        // Attach quizzes to students (quiz_student pivot)
        foreach ($students as $student) {
            $student->quizzes()->attach($quizzes->random(rand(1, 3))->pluck('id')->toArray());
        }

        // Attach badges to students (badge_user pivot)
        foreach ($students as $student) {
            $student->badges()->attach($badges->random(rand(1, 2))->pluck('id')->toArray());
        }

        // Create certificates
        foreach ($students as $student) {
            foreach ($student->courses as $course) {
                \App\Models\Certificate::create([
                    'certificate_number' => strtoupper(Str::random(10)),
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ]);
            }
        }
        $this->call([
            AdminUserSeeder::class,
        ]);

        echo "✅ Database seeding complete with nested relations, local files, and pivot tables.\n";
    }
}
