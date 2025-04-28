<?php

namespace App\Interfaces;

interface QuizRepositoryInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function find(int $id);
    public function findAndSubmit(int $id, int $data, bool $isBadge);
}
