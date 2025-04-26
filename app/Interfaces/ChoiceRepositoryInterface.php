<?php

namespace App\Interfaces;

interface ChoiceRepositoryInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
