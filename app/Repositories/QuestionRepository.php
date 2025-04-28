<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function create(array $data)
    {
        $question = new Question();
        $question->title = $data['title'];
        $question->quiz()->associate($data['quiz']);

        $question->save();

        return $question;
    }

    public function update(int $id, array $data)
    {
        $question = Question::find($id);
        $question->title = $data['title'];
        $question->quiz()->associate($data['quiz']);

        $question->save();

        return $question;
    }

    public function delete(int $id)
    {
        Question::destroy($id);
    }

    public function find(int $id)
    {
        return Question::findOrFail($id);
    }
}
