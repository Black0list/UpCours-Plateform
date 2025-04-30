<?php

namespace App\Http\Controllers;

use App\Interfaces\CertificateRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
use App\Models\Student;
use App\Repositories\CertificateRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    protected $certificateRepository;
    protected $courseRepository;

    public function __construct(CertificateRepositoryInterface $certificateRepository, CourseRepositoryInterface $courseRepository)
    {
        $this->certificateRepository = $certificateRepository;
        $this->courseRepository = $courseRepository;
    }
    public function generate(Request $request)
    {
        $course = $this->courseRepository->getById($request->get('course'));
        $this->certificateRepository->generate($course, Auth::user());

    	$pdf = PDF::loadView('global.certificate', [
            'title' => 'Certificate of Completion',
            'student' => Auth::user()->full_name,
            'logo' => $course->image,
            'course' => $course,
            'date' => now()->format('d m, Y'),
            'description' => 'This is a certificate of '.$course->title,
            'footer' => 'by UpCours - PlateForm',
        ])->setPaper('letter', 'landscape');

        return $pdf->stream($course->title.'.pdf');
    }
}
