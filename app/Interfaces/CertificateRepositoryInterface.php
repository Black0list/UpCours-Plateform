<?php

namespace App\Interfaces;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;

interface CertificateRepositoryInterface
{
    public function generate(Course $course, Student $student);
}
