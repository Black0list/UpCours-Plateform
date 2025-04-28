<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepo;
    protected $roleRepo;
    public function __construct(UserRepositoryInterface $userRepo, RoleRepositoryInterface $roleRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    public function adminDashboard()
    {
        $stats = $this->userRepo->stats();
        return view('admin.dashboard', compact('stats'));

    }

    public function index()
    {
        $users = $this->userRepo->all();
        $roles = $this->roleRepo->index();
        return view('admin.users', compact('users', 'roles'));
    }

    public function delete($id)
    {
        $this->userRepo->delete($id);
        return redirect()->back();
    }

    public function validateTeacher(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|integer',
        ]);

        $this->userRepo->validateTeacher($validated['teacher_id']);

        return redirect()->back();
    }

    public function rejectTeacher(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|integer',
        ]);

        $this->userRepo->rejectTeacher($validated['teacher_id']);

        return redirect()->back();
    }

    public function validation()
    {
        $pendingTeachers = $this->userRepo->findPendingTeachers();
        return view('admin.validation', compact('pendingTeachers'));
    }

    public function enroll(Request $request)
    {
        $studentId = $request->input('studentId');
        $courseId = $request->input('courseId');

        $data = [];
        $data['studentId'] = $studentId;
        $data['courseId'] = $courseId;

        try {
            $this->userRepo->enroll($data);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }

        return response()->json(['message' => 'Enrolled Successfully'], 200);
    }

    public function roleChange($id, Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|integer',
        ]);

        $this->userRepo->changeRole($id, $validated['role']);

        return redirect()->back();
    }
}
