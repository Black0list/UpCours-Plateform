<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
use GuzzleHttp\Psr7\Request;

class CourseController
{

    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    public function home()
    {
        $courses = $this->courseRepository->index();

        return view('global.courses', compact('courses'));
    }

    public function index()
    {
        $courses = $this->courseRepository->index();

        return view('admin.courses', compact('courses'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ],[
            'name.required',
        ]);

        $course = $this->courseRepository->create($data);
        return redirect()->route('admin.courses');
    }
}
