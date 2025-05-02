<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function validateTeacher(int $id);
    public function findPendingTeachers();
    public function enroll(array $data);
    public function find(int $id, string $role);
    public function all();
    public function delete(int $id);
    public function changeRole(int $id, int $role);
    public function update(array $data);
    public function create(array $data);
}
