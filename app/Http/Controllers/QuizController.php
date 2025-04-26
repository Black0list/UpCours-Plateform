<?php

namespace App\Http\Controllers;

use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Models\Quiz;
use App\Repositories\QuizRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{

    protected $quizRepo;
    protected $questionRepo;

    public function __construct(QuizRepositoryInterface $quizRepo, QuestionRepositoryInterface $questionRepo)
    {
        $this->quizRepo = $quizRepo;
        $this->questionRepo = $questionRepo;
    }
    public function findQuizById($id)
    {
        $quiz = $this->quizRepo->find($id);
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

        $quiz = $this->quizRepo->find($id);

        foreach ($data['answers'] as $item) {
            $QuestionId = $item['question'];
            $Answer = $item['answer'];

            $Question = $this->questionRepo->find($QuestionId);
            $CorrectAnswer = $Question->choices->where('is_correct', true)->first();

            Log::info('Correct Answer ID: ' . $CorrectAnswer->id . ', User Answer: ' . $Answer);

            if ($Answer == $CorrectAnswer->id) {
                $CorrectAnswersCount++;
            } else {
                $WrongAnswersCount++;
            }
        }

        return response()->json([
            'data' => [$CorrectAnswersCount, $WrongAnswersCount]
        ]);
    }
}
