<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $table = 'users';
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }
}
