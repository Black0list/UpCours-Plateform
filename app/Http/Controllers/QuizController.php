<?php

namespace App\Http\Controllers;

use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Quiz;
use App\Models\Student;
use App\Repositories\QuizRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{

    protected $quizRepo;
    protected $questionRepo;
    protected $userRepo;

    public function __construct(QuizRepositoryInterface $quizRepo, QuestionRepositoryInterface $questionRepo, UserRepositoryInterface $userRepo)
    {
        $this->quizRepo = $quizRepo;
        $this->questionRepo = $questionRepo;
        $this->userRepo = $userRepo;
    }
    public function findQuizById($courseId,$quizId)
    {
        $quiz = $this->quizRepo->find($quizId);
        $student = $this->userRepo->findStudent(Auth::id());

        if(!$student->courses->contains($courseId) || $student->quizzes->contains($quiz))
        {
            return redirect()->back()->with('failed', 'You are not authorized to access this quiz, You must be Enrolled Or You already passed the Quiz');
        }
        return view('global.quiz', compact('quiz'));
    }

    public function quizSubmit($id, Request $request)
    {

        $data = [];
        $data['student_id'] = Auth::user()->id;
        $data['quiz_id'] = $id;
        $data['answers'] = $request->get('answers');

        $CorrectAnswersCount = 0;
        $WrongAnswersCount = 0;
        $TotalAnswers = count($data['answers']);

        foreach ($data['answers'] as $item) {
            $QuestionId = $item['question'];
            $Answer = $item['answer'];

            $Question = $this->questionRepo->find($QuestionId);
            $CorrectAnswer = $Question->choices->where('is_correct', true)->first();

//            Log::info('Correct Answer ID: ' . $CorrectAnswer->id . ', User Answer: ' . $Answer);
            if ($Answer == $CorrectAnswer->id) {
                $CorrectAnswersCount++;
            } else {
                $WrongAnswersCount++;
            }
        }

        $percentage = ($CorrectAnswersCount / $TotalAnswers) * 100;

        if($percentage >= 80)
        {
            $badge = $this->quizRepo->findAndSubmit($id, $data['student_id'], true);
        } else {
            $badge = $this->quizRepo->findAndSubmit($id, $data['student_id'], false);
        }

        return response()->json([
            'data' => [$CorrectAnswersCount, $WrongAnswersCount],
            'badge' => [$badge]
        ]);
    }
}
