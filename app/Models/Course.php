<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Monitoring\Subscriber;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'content',
        'price',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Student::class, 'user_course', 'course_id', 'user_id')->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
