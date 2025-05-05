<?php

namespace App\Http\Controllers;

use App\Interfaces\CertificateRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
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
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository,CertificateRepositoryInterface $certificateRepository, CourseRepositoryInterface $courseRepository)
    {
        $this->certificateRepository = $certificateRepository;
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
    }
    public function generate(Request $request)
    {
        $course = $this->courseRepository->getById($request->get('course'));
        $user = $this->userRepository->find(Auth::id(), 'student');
        $this->certificateRepository->generate($course,$user);

    	$pdf = PDF::loadView('global.certificate', [
            'title' => 'Certificate of Completion',
            'student' => $user->full_name,
            'logo' => $course->image,
            'course' => $course,
            'date' => now()->format('d m, Y'),
            'description' => 'This is a certificate of '.$course->title,
            'footer' => 'by UpCours - PlateForm',
        ])->setPaper('letter', 'landscape');

        return $pdf->stream($course->title.'.pdf');
    }
}
