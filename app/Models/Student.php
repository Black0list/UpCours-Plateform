<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $table = 'users';
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_course', 'user_id', 'course_id')->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'student_quizzes', 'student_id', 'quiz_id')->withTimestamps();
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'badge_user', 'user_id', 'badge_id')->withTimestamps();
    }
}
