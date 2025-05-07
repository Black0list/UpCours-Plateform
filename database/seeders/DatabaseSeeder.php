<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{
    Role, Category, Tag, User, Student, Course,
    Badge, Quiz, Question, Choice, Certificate, Contact
};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedRoles();
        $categories = $this->seedCategories();
        $tags = $this->seedTags();
        $teachers = $this->seedTeachers();
        $students = $this->seedStudents();
        $courses = $this->seedCourses($teachers, $categories, $tags);
        $badges = $this->seedBadges();
        $quizzes = $this->seedQuizzes($courses, $badges);
        $this->attachStudentsToCourses($students, $courses);
        $this->attachBadgesToStudents($students, $badges);
        $this->attachQuizzesToStudents($students, $quizzes);
        $this->generateCertificates($students);

        $this->call([AdminUserSeeder::class]);

        echo "✅ Database seeding complete with nested relations, local files, and pivot tables.\n";
    }

    private function seedRoles()
    {
        Role::insert([
            ['role_name' => 'admin'],
            ['role_name' => 'teacher'],
            ['role_name' => 'student'],
        ]);
    }

    private function seedCategories()
    {
        return collect(range(1, 5))->map(fn() => Category::create([
            'name' => fake()->jobTitle(),
            'description' => fake()->sentence(),
        ]));
    }

    private function seedTags()
    {
        return collect(range(1, 10))->map(fn() => Tag::create([
            'name' => fake()->jobTitle(),
        ]));
    }

    private function seedTeachers()
    {
        $pics = ['avatar_1.png', 'avatar_2.png', 'avatar_3.png', 'user.png'];
        return collect(range(1, 5))->map(fn() => User::create([
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'photo' => 'icons/' . fake()->randomElement($pics),
            'password' => bcrypt('password'),
            'isPending' => false,
            'role_id' => 2,
        ]));
    }

    private function seedStudents()
    {
        $pics = ['avatar_1.png', 'avatar_2.png', 'avatar_3.png', 'user.png'];
        return collect(range(1, 20))->map(fn() => Student::create([
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'photo' => 'icons/' . fake()->randomElement($pics),
            'password' => bcrypt('password'),
            'isPending' => false,
            'role_id' => 3,
        ]));
    }

    private function seedCourses($teachers, $categories, $tags)
    {
        $images = ['image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg'];
        $contents = ['content_1.pdf', 'content_2.pdf', 'content_3.pdf', 'content_4.pdf'];

        return collect(range(1, 10))->map(function () use ($teachers, $categories, $tags, $images, $contents) {
            $course = Course::create([
                'title' => fake()->sentence(3),
                'description' => fake()->paragraph(),
                'image' => 'courses/images/' . fake()->randomElement($images),
                'content' => 'courses/contents/' . fake()->randomElement($contents),
                'price' => fake()->randomFloat(2, 0, 100),
                'teacher_id' => $teachers->random()->id,
                'category_id' => $categories->random()->id,
            ]);
            $course->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
            return $course;
        });
    }

    private function seedBadges()
    {
        $icons = ['badge_1.png', 'badge_2.png', 'badge_3.png', 'badge_4.png'];
        return collect(range(1, 5))->map(fn() => Badge::create([
            'badge_name' => fake()->word(),
            'icon' => 'badges/' . fake()->randomElement($icons),
        ]));
    }

    private function seedQuizzes($courses, $badges)
    {
        return $courses->map(function ($course) use ($badges) {
            $quiz = Quiz::create([
                'title' => fake()->sentence(2),
                'duration' => rand(10, 60),
                'course_id' => $course->id,
                'badge_id' => $badges->random()->id,
            ]);
            $this->createQuizQuestions($quiz);
            return $quiz;
        });
    }

    private function createQuizQuestions($quiz)
    {
        $questionBank = [
            [
                'title' => 'What is the capital of France?',
                'choices' => ['London', 'Paris', 'Berlin', 'Madrid'],
                'correct' => 'Paris',
            ],
            [
                'title' => 'What is the most used programming language in web development?',
                'choices' => ['Java', 'JavaScript', 'Ruby', 'C++'],
                'correct' => 'JavaScript',
            ],
            [
                'title' => 'What does CSS stand for?',
                'choices' => ['Cascading Style Sheets', 'Creative Style Sheets', 'Cascading Simple Sheets', 'Common Style Sheets'],
                'correct' => 'Cascading Style Sheets',
            ],
            [
                'title' => 'Which of the following is a frontend JavaScript framework?',
                'choices' => ['Django', 'React', 'Flask', 'Laravel'],
                'correct' => 'React',
            ],
            [
                'title' => 'What is the primary language used for Android development?',
                'choices' => ['Swift', 'Kotlin', 'C#', 'JavaScript'],
                'correct' => 'Kotlin',
            ],
            [
                'title' => 'Which company developed the Laravel framework?',
                'choices' => ['Facebook', 'Google', 'Taylor Otwell', 'Microsoft'],
                'correct' => 'Taylor Otwell',
            ],
        ];

        $selected = collect($questionBank)->random(3);
        foreach ($selected as $data) {
            // Validate that the question has choices before creating
            if (count($data['choices']) >= 2) {
                $question = Question::create([
                    'title' => $data['title'],
                    'quiz_id' => $quiz->id,
                ]);

                foreach ($data['choices'] as $text) {
                    Choice::create([
                        'question_id' => $question->id,
                        'text' => $text,
                        'is_correct' => $text === $data['correct'],
                    ]);
                }
            } else {
                // Skip the question if it has fewer than 2 choices
                continue;
            }
        }
    }

    private function attachStudentsToCourses($students, $courses)
    {
        foreach ($students as $student) {
            $student->courses()->attach($courses->random(rand(1, 3))->pluck('id'));
        }
    }

    private function attachQuizzesToStudents($students, $quizzes)
    {
        foreach ($students as $student) {
            $student->quizzes()->attach($quizzes->random(rand(1, 3))->pluck('id'));
        }
    }

    private function attachBadgesToStudents($students, $badges)
    {
        foreach ($students as $student) {
            $student->badges()->attach($badges->random(rand(1, 2))->pluck('id'));
        }
    }

    private function generateCertificates($students)
    {
        foreach ($students as $student) {
            foreach ($student->courses as $course) {
                Certificate::create([
                    'certificate_number' => strtoupper(Str::random(10)),
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
