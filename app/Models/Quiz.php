<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $fillable = [
        'title',
        'duration',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function badge()
    {
       return $this->belongsTo(Badge::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_quizzes', 'quiz_id', 'student_id')->withTimestamps();
    }
}
