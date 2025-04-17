<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Monitoring\Subscriber;

class Course extends Model
{
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
        return $this->hasMany(Student::class);
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
        return $this->belongsToMany(Tag::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
