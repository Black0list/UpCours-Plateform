<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Course;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        return User::paginate(8);
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


    public function update($data)
    {
        $user = User::find(Auth::id());

        $user->firstname = $data['firstname'] ?? $user->firstname;
        $user->lastname  = $data['lastname'] ?? $user->lastname;
        $user->email     = $data['email'] ?? $user->email;
        $user->phone     = $data['phone'] ?? $user->phone;

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        if (isset($data['photo']) && $data['photo'] instanceof UploadedFile) {
            $user->photo = $data['photo']->store('icons', 'public');
        }

        $user->save();
    }

    public function create($data)
    {
        $user = new User();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->phone = $data['phone'];
        $user->photo = "icons/user.png";
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->isPending = $data['status'];
        $user->role()->associate($data['role']);

        $user->save();
    }
}
