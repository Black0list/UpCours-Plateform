<?php

namespace App\Http\Controllers;

use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\ChoiceRepositoryInterface;

use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $quizRepository;
    protected $choiceRepository;
    protected $questionRepository;

    public function __construct(CourseRepositoryInterface $courseRepository, QuizRepositoryInterface $quizRepository, ChoiceRepositoryInterface $choiceRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->quizRepository = $quizRepository;
        $this->choiceRepository = $choiceRepository;
        $this->questionRepository = $questionRepository;
    }

    // Show courses to public
    public function home()
    {
        $courses = $this->courseRepository->index();
//        dd($courses);
        return view('global.courses', compact('courses'));
    }

    // Admin index
    public function index()
    {
        $courses = $this->courseRepository->index();
        return view('admin.courses.index', compact('courses'));
    }

    public function createForm()
    {
        $categories = Category::all();
        return view('teacher.create', compact('categories'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'content' => 'required|file|mimes:pdf,mp4,mov,avi,mkv|max:51200',
            'category_id' => 'required|integer',
            'teacher_id' => 'required|integer',

            'quiz_title' => 'required|string',
            'quiz_duration' => 'required|integer|min:1',
            'questions' => 'required|array',
        ]);

        $imagePath = $request->file('image')->store('courses/images', 'public');
        $contentPath = $request->file('content')->store('courses/content', 'public');

        $data['image'] = $imagePath;
        $data['content'] = $contentPath;

        $course = $this->courseRepository->create($data);

        $quiz = $this->quizRepository->create([
            'title' => $data['quiz_title'],
            'duration' => $data['quiz_duration'],
            'course' => $course,
        ]);

        foreach($data['questions'] as $question)
        {
            $questionObj = $this->questionRepository->create([
                'question' => $question['text'],
                'quiz' => $quiz,
            ]);
            foreach ($question['options'] as $choice){
                $is_correct = (bool)$question['correct'];
                $this->choiceRepository->create([
                    'choice' => $choice,
                    'is_correct' => $is_correct,
                    'question' => $questionObj,
                ]);
            }
        }

        return redirect('/courses');
    }

    // Show course
    public function show($id)
    {
        $course = $this->courseRepository->getById($id);
        return view('admin.courses.show', compact('course'));
    }

    // Edit form
    public function edit($id)
    {
        $course = $this->courseRepository->getById($id);
        return view('admin.courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'content' => 'nullable|file|mimes:pdf,mp4,mov,avi,mkv|max:51200',
            'category_id' => 'required|integer',
            'teacher_id' => 'required|integer',
        ]);

        if ($request->hasFile('content')) {
            $data['content'] = $request->file('content')->store('courses/content', 'public');
        }

        $this->courseRepository->update($id, $data);
        return redirect()->route('admin.courses')->with('success', 'Course updated.');
    }

    // Delete course
    public function destroy($id)
    {
        $this->courseRepository->delete($id);
        return redirect()->route('admin.courses')->with('success', 'Course deleted.');
    }
}
