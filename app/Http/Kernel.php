<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'auth_organization' => \App\Http\Middleware\AuthOrganization::class,
        'auth_organization_is_logged_in' => \App\Http\Middleware\AuthOrganizationIsLoggedIn::class,
        'auth_Admin' => \App\Http\Middleware\AuthAdmin::class,
        'auth_instructor' => \App\Http\Middleware\AuthInstructor::class,
        'instructor_class_access' => \App\Http\Middleware\InstructorClassAccess::class,
        'learner_class_access' => \App\Http\Middleware\LearnerClassAccess::class,
        'auth_instructor_login' => \App\Http\Middleware\AuthInstructorLogin::class,
        'auth_learner_login' => \App\Http\Middleware\AuthLearnerLogin::class,
        'auth_learner' => \App\Http\Middleware\AuthLearner::class,
        'poll_learner_access' => \App\Http\Middleware\PollLearnerAccess::class,
        'quiz_learner_access' => \App\Http\Middleware\QuizLearnerAccess::class,
        'assignment_learner_access' => \App\Http\Middleware\AssignmentLearnerAccess::class,
        'course_learner_access' => \App\Http\Middleware\CourseLearnerAccess::class,
        'auth_domain' => \App\Http\Middleware\AuthOrganizationUrl::class,
    ];
}
