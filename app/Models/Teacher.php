<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
