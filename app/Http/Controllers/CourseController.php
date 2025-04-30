<?php

namespace App\Http\Controllers;

use App\Interfaces\BadgeRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\ChoiceRepositoryInterface;

use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Course;
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
    protected $tagRepository;
    protected $badgeRepository;
    protected $userRepository;

    public function __construct(CourseRepositoryInterface $courseRepository, QuizRepositoryInterface $quizRepository, ChoiceRepositoryInterface $choiceRepository, QuestionRepositoryInterface $questionRepository, CategoryRepositoryInterface $categoryRepository, TagRepositoryInterface $tagRepository, BadgeRepositoryInterface $badgeRepository, UserRepositoryInterface $userRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->quizRepository = $quizRepository;
        $this->choiceRepository = $choiceRepository;
        $this->questionRepository = $questionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->badgeRepository = $badgeRepository;
        $this->userRepository = $userRepository;
    }

    public function myCourses()
    {
        $student = $this->userRepository->findStudent(Auth::id());
        $courses = $student->courses;
        return view('global.mycourses', compact('courses'));
    }

    // Show courses to public
    public function home(Request $request)
    {
        $search = $request->input('search');
        $courses = $this->courseRepository->search($search);

        return view('global.courses', compact('courses'));
    }

    public function Teacherdashboard()
    {
        $stats = $this->courseRepository->stats();
        return view('teacher.dashboard', compact('stats'));
    }

    //Home courses
    public function index()
    {
        $courses = $this->courseRepository->index()
            ->sortByDesc(function ($course) {
                return $course->subscribers->count();
            })
            ->take(3);

        return view('home', compact('courses'));
    }

    // Teacher index
    public function main()
    {
        $user = Teacher::find(Auth::id());
        $categories = $this->categoryRepository->all();
        $stats = $this->courseRepository->stats();
        return view('teacher.courses', compact('user', 'categories', 'stats'));
    }

    public function createForm()
    {
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->all();
        $badges = $this->badgeRepository->all();
        return view('teacher.create', compact('categories', 'tags', 'badges'));
    }

    public function updateForm($id)
    {
        $course = Course::find($id);
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->all();
        $badges = $this->badgeRepository->all();
        return view('teacher.update', compact('categories', 'tags', 'course','badges'));
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
            'badge_id' => 'required|integer',
            'tags' => 'required|array',

            'quiz_title' => 'required|string',
            'quiz_duration' => 'required|integer|min:1',
            'questions' => 'required|array',
        ]);

        $tags = [];

        $category = $this->categoryRepository->find($data['category_id']);

        foreach ($data['tags'] as $tag) {
            $tag = $this->tagRepository->find($tag);
            array_push($tags, $tag);
        }

        $data['tags'] = $tags;
        $data['category_id'] = $category;
        $data['badge_id'] = $this->badgeRepository->find($data['badge_id']);

        $course = $this->courseRepository->create($data);

        $quiz = $this->quizRepository->create([
            'title' => $data['quiz_title'],
            'duration' => $data['quiz_duration'],
            'badge' => $data['badge_id'],
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
            'badge_id' => 'required|integer',
            'tags' => 'required|array',

            'quiz_title' => 'required|string',
            'quiz_duration' => 'required|integer|min:1',
            'questions' => 'required|array',
        ]);

        $course = $this->courseRepository->update($id, $data);
        $quizId = $course->quizzes->first()->id;

        $quiz = $this->quizRepository->update($quizId, [
            'title' => $data['quiz_title'],
            'duration' => $data['quiz_duration'],
            'badge' => $data['badge_id'],
            'course' => $course,
        ]);

        foreach($data['questions'] as $question)
        {
            $questionObj = $question['id'] ?? false;

            if($questionObj)
            {
                $questionObj = $this->questionRepository->update($question['id'], [
                    'title' => $question['title'],
                    'quiz' => $quiz,
                ]);
            } else {
                $questionObj = $this->questionRepository->create([
                    'title' => $question['title'],
                    'quiz' => $quiz,
                ]);
            }

            foreach ($question['options'] as $index => $choice){
                $choiceObj = $choice['id'] ?? false;

                if($choiceObj)
                {
                    $is_correct = $choice['id'] === $question['correct'];
                    $this->choiceRepository->update($choice['id'], [
                        'choice' => $choice['text'],
                        'is_correct' => $is_correct,
                        'question' => $questionObj,
                    ]);
                } else {
                    $is_correct =  $index == $question['correct'];
                    $this->choiceRepository->create([
                        'choice' => $choice,
                        'is_correct' => $is_correct,
                        'question' => $questionObj,
                    ]);
                }
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
