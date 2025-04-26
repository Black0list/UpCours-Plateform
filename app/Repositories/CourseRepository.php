<?php

namespace App\Repositories;

use App\Interfaces\CourseRepositoryInterface;
use App\Models\Category;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseRepository implements CourseRepositoryInterface
{
    public function index()
    {
        return Course::all();
    }

    public function getById($id)
    {
        return Course::find($id);
    }

    public function create(array $data){

        DB::beginTransaction();

        try {
            $imagePath = $data['image']->store('courses/images', 'public');
            $contentPath = $data['content']->store('courses/contents', 'public');

            $data['image'] = $imagePath;
            $data['content'] = $contentPath;

            $course = new Course();
            $course->title = $data['title'];
            $course->description = $data['description'];
            $course->price = $data['price'];
            $course->image = $data['image'];
            $course->content = $data['content'];

            $course->teacher()->associate(Auth::user());
            $course->category()->associate(Category::find($data['category_id']));

            $course->save();

            DB::commit();

            return $course;
        } catch (\Exception $e) {
            if (!empty($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            if (!empty($contentPath)) {
                Storage::disk('public')->delete($contentPath);
            }

            DB::rollBack();
        }
    }

    public function update($id, array $data)
    {
        $course = Course::findOrFail($id);

        DB::beginTransaction();

        try {
            $originalImage = $course->image;
            $originalContent = $course->content;

            if (isset($data['image'])) {
                $imagePath = $data['image']->store('courses/images', 'public');
                Storage::disk('public')->delete($originalImage);
            } else {
                $imagePath = $originalImage;
            }

            if (isset($data['content'])) {
                $contentPath = $data['content']->store('courses/contents', 'public');
                Storage::disk('public')->delete($originalContent);
            } else {
                $contentPath = $originalContent;
            }

            $data['image'] = $imagePath;
            $data['content'] = $contentPath;

            $course->update($data);
            DB::commit();

            return $course;
        } catch (\Exception $e) {
            if (isset($imagePath) && $imagePath !== $originalImage) {
                Storage::disk('public')->delete($imagePath);
            }
            if (isset($contentPath) && $contentPath !== $originalContent) {
                Storage::disk('public')->delete($contentPath);
            }

            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update course. ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        Storage::disk('public')->delete($course->image);
        Storage::disk('public')->delete($course->content);
    }
}
