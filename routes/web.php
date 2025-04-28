<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [CourseController::class, 'index'])->name('home');


Route::get('/courses', [CourseController::class, 'home'])->name('courses');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
//    ======= auth =======
    Route::get('/profile', function () { return view('global.profile'); })->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/enroll', [UserController::class, 'enroll'])->name('enroll');
    Route::get('/course/{courseId}/quiz/{quizId}', [QuizController::class, 'findQuizById'])->name('quiz');
    Route::post('/quizSubmit/{id}', [QuizController::class, 'quizSubmit'])->name('quizSubmit');
//    ========== admin ==========
    Route::prefix('/admin')->group(function () {
        Route::get('/validation', [UserController::class, 'validation'])->name('admin.validation');
        Route::put('/validate', [UserController::class, 'validateTeacher'])->name('admin.teacher.validate');
        Route::delete('/reject', [UserController::class, 'rejectTeacher'])->name('admin.teacher.reject');
        Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
//    ============ Category ============
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/category', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
//    ============ Tag ============
        Route::get('/tags', [TagController::class, 'index'])->name('admin.tags.index');
        Route::post('/tag', [TagController::class, 'create'])->name('admin.tags.create');
        Route::put('/tag/{id}', [TagController::class, 'update'])->name('admin.tags.update');
        Route::delete('/tag/{id}', [TagController::class, 'delete'])->name('admin.tags.delete');

//    ============ Badge ============
        Route::get('/badges', [BadgeController::class, 'index'])->name('admin.badges.index');
        Route::post('/badge', [BadgeController::class, 'create'])->name('admin.badges.create');
        Route::put('/badge/{id}', [BadgeController::class, 'update'])->name('admin.badges.update');
        Route::delete('/badge/{id}', [BadgeController::class, 'delete'])->name('admin.badges.delete');

//    ============ Role ============
        Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::post('/role', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::put('/role/{id}', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/role/{id}', [RoleController::class, 'delete'])->name('admin.roles.delete');

//    ============ User ============
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::put('/users/{id}', [UserController::class, 'roleChange'])->name('admin.users.roleChange');
        Route::delete('/users/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
    });


    Route::prefix('teacher')->group(function () {
        Route::get('/dashboard', [CourseController::class, 'Teacherdashboard'])->name('teacher.dashboard');
        Route::get('/courses',[CourseController::class, 'main'])->name('teacher.courses.main');

        Route::get('/course',[CourseController::class, 'createForm'])->name('teacher.courses.createForm');
        Route::get('/course/{id}',[CourseController::class, 'updateForm'])->name('teacher.courses.updateForm');
        Route::post('/course', [CourseController::class, 'create'])->name('teacher.courses.create');
        Route::put('/course/{id}',[CourseController::class, 'update'])->name('teacher.courses.update');
        Route::delete('/course/{id}',[CourseController::class, 'delete'])->name('teacher.courses.delete');
    });

    Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');



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

