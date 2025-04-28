<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Course;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        return User::all();
    }

    public function stats()
    {
        $stats['users'] = User::all();
        $stats['roles'] = Role::all()->count();
        $stats['enrollments'] = Student::all()->sum(function ($user) {
            return $user->courses()->count();
        });
        $stats['courses'] = Course::all();

        return $stats;
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
    public function validateTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher->isPending = false;
        $teacher->save();

    }

    public function rejectTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
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

    public function findStudent($id)
    {
        return Student::find($id);
    }

    public function changeRole($id, $role)
    {
        $user = User::find($id);
        $user->role()->associate(Role::find($role));
        $user->save();
    }
}
