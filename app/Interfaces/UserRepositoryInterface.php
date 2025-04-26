<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function validateTeacher(int $id);

    public function findPendingTeachers();
    public function enroll($data);
}
