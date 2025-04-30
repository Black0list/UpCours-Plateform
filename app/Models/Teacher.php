<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    use HasFactory;


    protected $table = 'users';
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
