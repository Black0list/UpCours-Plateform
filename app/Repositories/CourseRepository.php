<?php

namespace App\Repositories;

use App\Interfaces\CourseRepositoryInterface;
use App\Models\Category;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class CourseRepository implements CourseRepositoryInterface
{
    public function index()
    {
        return Course::all();
    }

    public function getById($id)
    {
        return Course::with(['category', 'teacher'])->findOrFail($id);
    }

    public function create(array $data)
    {
        $course = new Course();
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->image = $data['image'];
        $course->content = $data['content'];

        $teacher = Auth::user();
        $category = Category::find($data['category_id']);

        $course->teacher()->associate($teacher);
        $course->category()->associate($category);
        $course->save();

        return $course;
    }

    public function update($id, array $data)
    {
        $course = Course::findOrFail($id);
        $course->update($data);
        return $course;
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        return $course->delete();
    }
}
