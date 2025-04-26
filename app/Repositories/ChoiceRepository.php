<?php

namespace App\Repositories;

use App\Interfaces\ChoiceRepositoryInterface;
use App\Models\Choice;

class ChoiceRepository implements ChoiceRepositoryInterface
{
    public function create(array $data)
    {
        $choice = new Choice();
        $choice->text = $data['choice'];
        $choice->is_correct = $data['is_correct'];
        $choice->question()->associate($data['question']);

        $choice->save();
        return $choice;
    }

    public function update(int $id, array $data)
    {
        $choice = Choice::find($id);
        $choice->text = $data['choice'];
        $choice->is_correct = $data['is_correct'];
        $choice->question()->associate($data['question']);

        $choice->save();
        return $choice;
    }

    public function delete(int $id)
    {
        return Choice::destroy($id);
    }
}
