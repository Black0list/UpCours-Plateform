<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\ChoiceRepositoryInterface;

use App\Models\Category;
use App\Models\Course;
use App\Models\Tag;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $quizRepository;
    protected $choiceRepository;
    protected $questionRepository;
    protected $categoryRepository;

    public function __construct(CourseRepositoryInterface $courseRepository, QuizRepositoryInterface $quizRepository, ChoiceRepositoryInterface $choiceRepository, QuestionRepositoryInterface $questionRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->quizRepository = $quizRepository;
        $this->choiceRepository = $choiceRepository;
        $this->questionRepository = $questionRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // Show courses to public
    public function home()
    {
        $courses = $this->courseRepository->index();
        $categories = $this->categoryRepository->all();
        return view('global.courses', compact('courses', 'categories'));
    }

    // Teacher index
    public function main()
    {
        $user = Teacher::find(Auth::id());
        $categories = $this->categoryRepository->all();
        return view('teacher.courses', compact('user', 'categories'));
    }

    public function createForm()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('teacher.create', compact('categories'));
    }

    public function updateForm($id)
    {
        $course = Course::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('teacher.update', compact('categories', 'tags', 'course'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'content' => 'required|file|mimes:pdf,mp4,mov,avi,mkv',
            'category_id' => 'required|integer',

            'quiz_title' => 'required|string',
            'quiz_duration' => 'required|integer|min:1',
            'questions' => 'required|array',
        ]);

        $course = $this->courseRepository->create($data);

        $quiz = $this->quizRepository->create([
            'title' => $data['quiz_title'],
            'duration' => $data['quiz_duration'],
            'course' => $course,
        ]);

        foreach($data['questions'] as $question)
        {
            $questionObj = $this->questionRepository->create([
                'title' => $question['title'],
                'quiz' => $quiz,
            ]);

            foreach ($question['options'] as $index => $choice){
                $is_correct =  $index == $question['correct'];
                $this->choiceRepository->create([
                    'choice' => $choice,
                    'is_correct' => $is_correct,
                    'question' => $questionObj,
                ]);
            }
        }

        return redirect()->route('teacher.courses.main');
    }

    // Show course
    public function show($id)
    {
        $course = $this->courseRepository->getById($id);
        return view('global.course', compact('course'));
    }

    // Update course
    public function update(Request $request, $id)
    {
//        dd($request);
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'content' => 'file|mimes:pdf,mp4,mov,avi,mkv',
            'category_id' => 'required|integer',

            'quiz_title' => 'required|string',
            'quiz_duration' => 'required|integer|min:1',
            'questions' => 'required|array',
        ]);

        $course = $this->courseRepository->update($id, $data);
        $quizId = $course->quizzes[0]->id;

        $quiz = $this->quizRepository->update($quizId, [
            'title' => $data['quiz_title'],
            'duration' => $data['quiz_duration'],
            'course' => $course,
        ]);

        foreach($data['questions'] as $question)
        {
            $questionObj = $this->questionRepository->update($question['id'],[
                'title' => $question['title'],
                'quiz' => $quiz,
            ]);

            foreach ($question['options'] as  $choice){
                $is_correct =  $choice['id'] == $question['correct'];
                $this->choiceRepository->update($choice['id'], [
                    'choice' => $choice['text'],
                    'is_correct' => $is_correct,
                    'question' => $questionObj,
                ]);
            }
        }

        return redirect()->route('teacher.courses.main')->with('success', 'Course updated.');
    }

    // Delete course
    public function delete($id)
    {
        $this->courseRepository->delete($id);
        return redirect()->route('teacher.courses.main')->with('success', 'Course deleted.');
    }
}
