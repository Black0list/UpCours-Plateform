<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class QuizRepository implements QuizRepositoryInterface
{
    public function create(array $data)
    {
        $quiz = new Quiz();
        $quiz->title = $data['title'];
        $quiz->duration = $data['duration'];
        $quiz->course()->associate($data['course']);

        $quiz->save();

        return $quiz;
    }

    public function update(int $id, array $data)
    {
        $quiz = Quiz::find($id);
        $quiz->title = $data['title'];
        $quiz->duration = $data['duration'];
        $quiz->course()->associate($data['course']);

        $quiz->save();

        return $quiz;
    }

    public function delete(int $id)
    {
        return Quiz::destroy($id);
    }

    public function find(int $id)
    {
        return Quiz::with("questions.choices")->find($id);
    }

    public function findAndSubmit(int $id, array $data)
    {
        $quiz = $this->find($id);
        $student = Student::find($data['student_id']);
        $quiz->students()->attach($student);

        return response()->json(['message' => 'Quiz submitted successfully!'], 200);
    }
}
