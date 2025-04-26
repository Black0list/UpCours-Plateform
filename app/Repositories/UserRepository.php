<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    public function validateTeacher($id)
    {

    }

    public function findPendingTeachers()
    {
        return Teacher::where('isPending', true)->get();
    }

    public function enroll($data)
    {
        $student = Student::find($data['studentId']);
        $course = Course::find($data['courseId']);

        if (!$student || !$course) {
            throw new \Exception('Student or Course not found');
        }

        if ($student->courses->contains($course)) {
            $student->courses()->detach($course);
        } else {
            $student->courses()->attach($course);
        }
    }

}
