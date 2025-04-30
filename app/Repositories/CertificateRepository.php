<?php

namespace App\Repositories;

use App\Interfaces\CertificateRepositoryInterface;
use App\Models\Certificate;

class CertificateRepository implements CertificateRepositoryInterface
{
    public function generate($course, $student)
    {
        $certificate = new Certificate();
        $certificate->certificate_number = rand('111111', '999999');
        $certificate->course()->associate($course);
        $certificate->student()->associate($student);
        $certificate->save();
    }
}
