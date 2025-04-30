<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\BadgeRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CertificateRepositoryInterface;
use App\Interfaces\ChoiceRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\BadgeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CertificateRepository;
use App\Repositories\ChoiceRepository;
use App\Repositories\CourseRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizRepository;
use App\Repositories\RoleRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );

        $this->app->bind(
            CertificateRepositoryInterface::class,
            CertificateRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );

        $this->app->bind(
            QuizRepositoryInterface::class,
            QuizRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            TagRepositoryInterface::class,
            TagRepository::class
        );

        $this->app->bind(
            BadgeRepositoryInterface::class,
            BadgeRepository::class
        );

        $this->app->bind(
            ChoiceRepositoryInterface::class,
            ChoiceRepository::class
        );

        $this->app->bind(
            QuestionRepositoryInterface::class,
            QuestionRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
