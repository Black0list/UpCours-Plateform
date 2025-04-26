<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    public function index()
    {

    }

    public function validateTeacher(Request $request)
    {

    }

    public function validation()
    {
        return $this->userRepo->findPendingTeachers();
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
}
