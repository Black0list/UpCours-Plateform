<?php

namespace App\Repositories;

use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function index()
    {
        $courses = Course::all();
        return $courses;
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function create(array $data)
    {

    }

    public function update(array $data, $id)
    {

    }

    public function delete($id)
    {

    }
}
