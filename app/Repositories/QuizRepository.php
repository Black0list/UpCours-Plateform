<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Badge;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizRepository implements QuizRepositoryInterface
{

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function create(array $data)
    {
        $quiz = new Quiz();
        $quiz->title = $data['title'];
        $quiz->duration = $data['duration'];
        $quiz->badge()->associate($data['badge']);
        $quiz->course()->associate($data['course']);

        $quiz->save();

        return $quiz;
    }

    public function update(int $id, array $data)
    {
        $quiz = Quiz::find($id);
        $quiz->title = $data['title'];
        $quiz->duration = $data['duration'];
        $quiz->badge()->associate($data['badge']);
        $quiz->course()->associate($data['course']);

        $quiz->save();

        return $quiz;
    }

    public function delete(int $id)
    {
        return Quiz::destroy($id);
    }

    public function find(int $id)
    {
        return Quiz::with("questions.choices")->find($id);
    }

    public function findAndSubmit($id, $studentId, $isBadge)
    {
        $quiz = $this->find($id);
        $student = $this->userRepository->find($studentId, 'student');

        if (!$student->quizzes->contains($quiz)) {
            $student->quizzes()->attach($quiz);
        }

        if($isBadge){
            if (!$student->badges->contains($quiz->badge)) {
                $student->badges()->attach($quiz->badge);
            }
        }

        $student->save();

        $badge = $student->badges()->where('badge_id', $quiz->badge->id)->first();

        return $badge ?? false;
    }
}
