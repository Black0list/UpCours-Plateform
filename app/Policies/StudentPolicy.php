<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class StudentPolicy
{
    public function access(Student $student): bool
    {
//        Log::info('Unauthorized access attempt. Role: ' . $student->role->role_name);
        if ($student->role->role_name !== 'student') {
            Log::info('Unauthorized access attempt. Role: ' . $student->role->role_name);
            return false;
        }

        return true;
    }

}
