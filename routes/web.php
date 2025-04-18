<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes principales de l'application UpCours.
|
*/

Route::middleware(['web'])->group(function () {

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/courses', [CourseController::class, 'home'])->name('courses');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
//    ======= auth =======
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/courses/create', [CourseController::class, 'create']);
//    ========== admin ==========
    Route::prefix('/admin')->group(function () {
//        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
//        Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses');
//        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
//        Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles');
//        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
//        Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses');
//        Route::get('/tags', [TagController::class, 'index'])->name('admin.tags');
//        Route::get('/badges', [BadgeController::class, 'index'])->name('admin.badges');
//        Route::get('/quizzes', [QuizController::class, 'index'])->name('admin.quizzes');
//    =========== Course ===========

//        Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses');

        Route::get('/courses/{id}', [CourseController::class, 'show'])->name('admin.courses.show');
        Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
        Route::post('/courses/{id}/edit', [CourseController::class, 'update']);
        Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
    });



//    ============ Role ============
    Route::get('/role', [RoleController::class, 'create'])->name('RoleCreate');
});

});








//Route::get('/', function () {
//    return view('home');
//})->name('home');
//
//
Route::get('/courses', [CourseController::class, 'home'])->name('courses');
//
//Route::get('/users', function () {
//    return view('admin.users');
//})->name('admin.users');
//
//Route::get('/categories', function () {
//    return view('admin.categories');
//})->name('admin.categories');
//
//
//Route::get('/roles', function () {
//    return view('admin.roles');
//})->name('admin.roles');
//
//Route::get('/tags', function () {
//    return view('admin.tags');
//})->name('admin.tags');
//
//Route::get('/badges', function () {
//    return view('admin.badges');
//})->name('admin.badges');
//
//Route::get('/quizzes', function () {
//    return view('admin.quizzes');
//})->name('admin.quizzes');
//
//Route::get('/stats', function () {
//    return view('admin.stats');
//})->name('admin.stats');
//
//Route::get('/settings', function () {
//    return view('admin.settings');
//})->name('admin.settings');
//
//
//Route::get('/course', function () {
//    return view('course');
//})->name('course');
//
//
//Route::get('/quiz', function () {
//    return view('quiz');
//})->name('quiz');
//
//Route::get('/profile', function () {
//    return view('profile');
//})->name('profile');
//
//Route::get('/login', function () {
//    return view('auth', ['mode' => 'login']);
//})->name('login');
//
//Route::get('/register', function () {
//    return view('auth', ['mode' => 'register']);
//})->name('register');
//
//
//Route::prefix('admin')->group(function () {
//    Route::get('/dashboard', function () {
//        return view('admin.dashboard');
//    })->name('admin.dashboard');
//});
//
//
Route::prefix('teacher')->group(function () {
    Route::get('/dashboard', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
    Route::get('/courses/create', function () {
        return view('teacher.create');
    })->name('teacher.create');
});
