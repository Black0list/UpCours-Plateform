<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function create(array $data)
    {
        $question = new Question();
        $question->question = $data['question'];
        $question->quiz()->associate($data['quiz']);

        $question->save();

        return $question;
    }
}
