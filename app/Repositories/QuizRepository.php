<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Models\Course;
use App\Models\Quiz;

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
}
