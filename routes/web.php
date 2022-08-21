<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\LoginOrganization;
use App\Http\Controllers\LoginInstructor;
use App\Http\Controllers\Organization;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginLearnerController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$domain = parse_url(config('app.url'),  PHP_URL_HOST);
Route::group(['domain' => 'admin.' . $domain, 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth_Admin']], function () {
        Route::get('/dashboard', [Admin::class, 'dashboard'])->name('dashboard');
        Route::get('/organizations', [Admin::class, 'organizations'])->name('organizations');

        Route::group(['as' => 'organization.', 'prefix' => 'organization/{organization}',], function () {
            Route::any('/details', [Admin::class, 'viewOrganization'])->name('view');
            Route::any('/update', [Admin::class, 'updateOrganizations'])->name('update');
        });




        Route::get('/logout', [Admin::class, 'logout'])->name('logout');
    });
    Route::get('/', [Admin::class, 'index'])->name('login');
    Route::post('/', [Admin::class, 'processLogin']);
    Route::post('/forgot-password', [Admin::class, 'forgotPassword'])->name('forgot_password');
    Route::get('/reset-password/{token}', [Admin::class, 'resetPassword'])->name('reset_password');
    Route::post('/reset-password/{token}', [Admin::class, 'processResetPassword']);
});
Route::group(['domain' => 'app.' . $domain, 'prefix' => 'organization',], function () {

    Route::group(['middleware' => ['auth_organization_is_logged_in']], function () {
        Route::get('/', [LoginOrganization::class, 'index'])->name('login');
        Route::post('/', [LoginOrganization::class, 'processLogin'])->name('login_process');
        Route::get('/register', [LoginOrganization::class, 'registerView'])->name('register');
        Route::post('/register', [LoginOrganization::class, 'registerProcess'])->name('register');
        Route::post('/forgot-password', [LoginOrganization::class, 'forgotPassword'])->name('forgot_password');
        Route::get('/register/verify/{token}', [LoginOrganization::class, 'registerVerifyToken'])->name('verify_org_token');
        Route::get('/reset-password/{token}', [LoginOrganization::class, 'resetPassword'])->name('reset_password');
        Route::post('/reset-password/{token}', [LoginOrganization::class, 'processResetPassword']);
    });


    Route::group(['middleware' => ['auth_organization']], function () {


        Route::get('/dashboard', [Organization::class, 'index'])->name('organization_dashboard');
        Route::get('/timeline', [Organization::class, 'timeline'])->name('organization_timeline');


        Route::get('/profile', [Organization::class, 'profile'])->name('organization_user_profile');
        Route::post('/profile', [Organization::class, 'updateProfile']);
        Route::get('/account', [Organization::class, 'appearance'])->name('organization_appearance');
        Route::post('/account', [Organization::class, 'updateappearance']);
        Route::get('/customize', [Organization::class, 'customize'])->name('organization_customize');
        Route::post('/customize', [Organization::class, 'updateCustomize']);
        Route::get('/domain-mapping', [Organization::class, 'domainMapping'])->name('domainMapping');
        Route::post('/domain-mapping', [Organization::class, 'updateDomain']);


        Route::get('/classes', [CategoryController::class, 'classes'])->name('organization_classes');
        Route::get('/classes-all', [CategoryController::class, 'allClass'])->name('organization_course_new');
        Route::get('/class-add', [CategoryController::class, 'newClass'])->name('organization_class_new');
        Route::post('/class-add', [CategoryController::class, 'processNewClass'])->name('organization_class_new');
        Route::post('/classes/update/{class}', [CategoryController::class, 'updateClass'])->name('organization_class_update');
        Route::get('/showClass/{class}', [CategoryController::class, 'showClass']);
        Route::get('/deleteClass/{class}', [CategoryController::class, 'deleteClass']);

        Route::get('/users', [Organization::class, 'user'])->name('organization_users');
        Route::get('/users-all', [Organization::class, 'allUsers']);
        Route::get('/users-add', [Organization::class, 'addUser'])->name('organization_add_user');
        Route::post('/users-add', [Organization::class, 'processNewUser']);
        Route::post('/importCsv', [Organization::class, 'importCsv'])->name('importCsv');
        Route::get('/users-add-bulk', [Organization::class, 'addBulkUser'])->name('organization_add_bulk_user');
        Route::post('/users-add-bulk', [Organization::class, 'processNewBulkUser']);
        Route::get('/users/delete/{user_id}/{type}', [Organization::class, 'deleteUser']);

        Route::get('/instructors', [InstructorController::class, 'instructor'])->name('organization_instuctors');
        Route::get('/instructors-all', [InstructorController::class, 'allInstructors'])->name('organization_all_instructors');
        Route::get('/instructor/{instructor}/mail-details', [InstructorController::class, 'sendInstructorMail']);
        Route::get('/instructors-add', [InstructorController::class, 'newInstructor'])->name('organization_instuctor_new');
        Route::post('/instructors-add', [InstructorController::class, 'processNewInstructor'])->name('organization_instuctor_new');
        Route::post('/instructors/update/{instructor}', [InstructorController::class, 'updateInstructor'])->name('organization_instuctor_update');
        Route::get('/instructors/delete/{instructor}', [InstructorController::class, 'deleteInstructor'])->name('organization_delete_update');


        Route::get('/learners', [LearnerController::class, 'learner'])->name('organization_learners');
        Route::get('/learners-all', [LearnerController::class, 'allLearners'])->name('organization_all_learners');
        Route::get('/learner/{learner}/mail-details', [LearnerController::class, 'sendLearnerMail']);
        Route::get('/learners-add', [LearnerController::class, 'newLearner'])->name('organization_learner_new');
        Route::post('/learners-add', [LearnerController::class, 'processNewLearner']);
        Route::post('/learners/update/{learner}', [LearnerController::class, 'updateLearner'])->name('organization_learner_update');
        Route::get('/learners/delete/{learner}', [LearnerController::class, 'deleteLearner'])->name('organization_delete_learner');



        // Route::post('/', [LoginOrganization::class, 'processLogin'])->name('login');
        // Route::get('/register', [LoginOrganization::class, 'registerView'])->name('register');
        // Route::post('/register', [LoginOrganization::class, 'registerProcess'])->name('register');


        Route::get('/logout', [Organization::class, 'logout'])->name('organization_logout');
    });
});
Route::group(['domain' => '{account}.' . $domain, 'middleware' => ['auth_domain']], function () {

    Route::group(['prefix' => 'instructor'], function () {

        Route::group(['middleware' => 'auth_instructor_login'], function () {
            Route::get('/', [LoginInstructor::class, 'index'])->name('instructor_login');
            Route::post('/', [LoginInstructor::class, 'processLogin']);
            Route::post('/forgot-password', [LoginInstructor::class, 'forgotPassword'])->name('instructor_forgot_password');
            Route::get('/reset-password/{token}', [LoginInstructor::class, 'resetPassword'])->name('instructor_reset_password');
            Route::post('/reset-password/{token}', [LoginInstructor::class, 'processResetPassword']);
        });
        Route::group(['middleware' => 'auth_instructor'], function () {
            Route::get('/instructor_profile', [InstructorController::class, 'instructor_profile'])->name('instructor_profile');
            Route::get('/timeline', [InstructorController::class, 'instructorDashboard'])->name('instructor_dashboard');
            Route::get('/profile', [InstructorController::class, 'instructorProile'])->name('instructor_profile');
            Route::post('/profile', [InstructorController::class, 'updateInstructorProile']);

            Route::post('/comment/edit', [InstructorController::class, 'comment_edit'])->name('comment_edit');
            Route::get('/comment/delete/{id}', [InstructorController::class, 'comment_delete'])->name('comment_delete');


            Route::group(['prefix' => 'class/{class}', 'middleware' => 'instructor_class_access'], function () {
                Route::get('/', [InstructorController::class, 'instructorClass'])->name('instructor_class');
                Route::post('/', [InstructorController::class, 'updateInstructorClass'])->name('update_instructor_class');
                Route::post('/upload_post', [InstructorController::class, 'instructorUploadClassPost'])->name('instructor_class_upload_post');
                Route::post('/upload_post_comment', [InstructorController::class, 'instructorUploadClassPostComment'])->name('instructor_class_upload_post_comment');
                Route::post('/upload_post_like', [InstructorController::class, 'instructorUploadClassPostLike'])->name('instructor_class_upload_post_like');



                Route::get('/courses-add', [CourseController::class, 'newCourse'])->name('instructor_course_new');
                Route::post('/courses-add', [CourseController::class, 'processNewCourse']);
                Route::get('/courses-build/{course_id}', [CourseController::class, 'buildCourse'])->name('instructor_course_build');

                Route::get('/courses-build/{course}/create/{chapter_name}', [ChapterController::class, 'addChapter'])->name('instructor_course_build_create');
                Route::get('/courses-build/{course_id}/delete/{chapter}', [ChapterController::class, 'deleteChapter'])->name('instructor_course_build_delete_chapter');
                Route::get('/courses-build/{course_id}/all', [ChapterController::class, 'allChapter'])->name('instructor_course_build_all_chapters');

                Route::get('/courses-build/{course_id}/create/{chapter_id}/{block_name}', [BlockController::class, 'addBlock'])->name('instructor_course_build_create_block');
                Route::post('/courses-build/{course}/update-content/{block}', [BlockController::class, 'updateBlockContent'])->name('instructor_course_build_upload_block_content');
                Route::get('/courses-build/{course_id}/delete/block/{block_id}', [BlockController::class, 'deleteBlock'])->name('instructor_course_build_delete_block');
                Route::get('/courses-build/{course_id}/{chapter_id}/all', [BlockController::class, 'allBlocks'])->name('instructor_course_build_all_chapter_blocks');


                Route::get('/poll-add', [PollController::class, 'newPoll'])->name('instructor_poll_new');
                Route::post('/poll-add', [PollController::class, 'processNewPoll']);
                Route::get('/poll/{poll}', [PollController::class, 'viewPoll'])->name('instructor_poll_view');


                Route::get('/assignment-add', [AssignmentController::class, 'newAssignment'])->name('instructor_assignment_new');
                Route::post('/assignment-add', [AssignmentController::class, 'processNewAssignment']);
                Route::get('/assignment/{assignment}', [AssignmentController::class, 'viewAllAssignmentSubmissions'])->name('instructor_assignment_submissions');

                Route::get('/assignment/{assignment}/submissions', [AssignmentController::class, 'getAllSubmittedAssignments']);
                Route::get('/assignment/{assignment}/view/{assignment_learner}', [AssignmentController::class, 'viewSubmission'])->name('instructor_view_assignment_submission');
                Route::get('/assignment/{assignment}/view/{assignment_learner}/status/{status?}', [AssignmentController::class, 'submissionStatus'])->name('instructor_submission_status');



                Route::get('/quiz-add', [QuizController::class, 'newQuiz'])->name('instructor_quiz_new');
                Route::post('/quiz-add', [QuizController::class, 'processNewQuiz']);
                Route::get('/quiz-build/{quiz}', [QuizController::class, 'buildQuiz'])->name('instructor_quiz_build');
                Route::post('/quiz-build/{quiz}/upload', [QuizController::class, 'processBuiltQuiz']);

                Route::get('/quiz/{quiz}', [QuizController::class, 'viewAllQuizSubmissions'])->name('instructor_quiz_submissions');
                Route::get('/quiz/{quiz}/submissions', [QuizController::class, 'getAllSubmittedQuizzes']);
                Route::get('/quiz/{quiz}/view/{learner}', [QuizController::class, 'viewSubmission'])->name('instructor_view_quiz_submission');
                Route::get('/quiz/{quiz}/update/{learner_quiz_option}/status/{status?}', [QuizController::class, 'submissionStatus'])->name('instructor_update_submission_status');
            });


            Route::get('/classes', [InstructorController::class, 'instructorClasses'])->name('instructor_classes');
            Route::get('/classes-all', [InstructorController::class, 'allInstructorClasses']);
            Route::get('/classes/create', [InstructorController::class, 'instructorClassCreate'])->name('instructor_class_create');
            Route::post('/classes/create', [InstructorController::class, 'processNewClass']);
            Route::post('/classes/update/{class}', [InstructorController::class, 'updateClass'])->name('instructor_class_update');
            Route::get('/classes/delete/{id}', [InstructorController::class, 'deleteClass'])->name('instructor_class_delete');
            Route::get('/classes/detail/{id}', [InstructorController::class, 'classDetail'])->name('instructor_classDetail');




            Route::get('/activities', [InstructorController::class, 'instructorActivities'])->name('instructor_activities');
            Route::get('/course/{course}/learner', [InstructorController::class, 'instructorCourseLearners'])->name('instructor_course_learners');
            Route::get('/course/create', [InstructorController::class, 'newCourse'])->name('instructor_course_create');
            Route::post('/course/create', [InstructorController::class, 'processNewCourse']);
            Route::get('/courses-all', [CourseController::class, 'allCourse'])->name('instructor_course_newI');
            Route::any('/activities/update/{course}', [CourseController::class, 'updateCourse']);
            Route::get('/activities/delete/{course}', [CourseController::class, 'deleteCourse']);

            Route::get('/assignments', [AssignmentController::class, 'instructorAssignments'])->name('instructor_assignments');
            Route::get('/assignment/create', [AssignmentController::class, 'newAssignmentWithoutClass'])->name('instructor_assignment_create');
            Route::post('/assignment/create', [AssignmentController::class, 'processNewAssignmentWithoutClass']);
            Route::get('/assignments-all', [AssignmentController::class, 'allAssignments']);
            Route::get('/assignments/delete/{assignment}', [AssignmentController::class, 'deleteAssignment']);
            Route::post('/assignments/update/{assignment}', [AssignmentController::class, 'updateAssignment'])->name('instructor_assignment_update');


            Route::get('/quizzes', [QuizController::class, 'instructorQuizzes'])->name('instructor_quizzes');
            Route::get('/quiz/create', [QuizController::class, 'newQuizWithoutClass'])->name('instructor_quiz_create');
            Route::post('/quiz/create', [QuizController::class, 'processNewQuizWithoutClass']);
            Route::get('/quizzes-all', [QuizController::class, 'allQuizzes']);
            Route::get('/quizzes/delete/{quiz}', [QuizController::class, 'deleteQuiz']);
            Route::any('/quizzes/update/{quiz}', [QuizController::class, 'updateQuiz'])->name('instructor_quiz_update');
            Route::get('/quizzes/view/{quiz}', [QuizController::class, 'viewQuiz'])->name('instructor_quiz_view');
            Route::post('/quizzes/view/{quiz}/new-question', [QuizController::class, 'newQuizQuestion'])->name('instructor_quiz_new_question');



            Route::post('/quiz-question/update/{quizQuestion}', [QuizController::class, 'updateQuizQuestion'])->name('instructor_quiz_question_update');
            Route::post('/quiz-question/addOption/{quizQuestion}', [QuizController::class, 'addOptionQuizQuestion'])->name('instructor_quiz_question_add_option');

            Route::any('/quiz-option/update/{quizOption}', [QuizController::class, 'updateQuizOption'])->name('instructor_quiz_option_update');

            Route::get('/polls', [InstructorController::class, 'instructorPolls'])->name('instructor_polls');
            Route::get('/polls/create', [InstructorController::class, 'newPoll'])->name('instructor_poll_create');
            Route::post('/polls/create', [InstructorController::class, 'processNewPoll']);
            Route::get('/polls-all', [PollController::class, 'allPolls']);
            Route::get('/polls/delete/{poll}', [InstructorController::class, 'deletePoll']);
            Route::post('/polls/update/{poll}', [InstructorController::class, 'updatePoll'])->name('instructor_poll_update');


            Route::get('/learners', [LearnerController::class, 'instructorLearners'])->name('instructor_learners');
            Route::get('/learners/{learner}', [LearnerController::class, 'viewLearner'])->name('instructor_view_learner');
            Route::get('/learners-all', [LearnerController::class, 'allInstructorLearners']);


            Route::get('/logout', [InstructorController::class, 'logout'])->name('instructor_logout');
        });
    });
    Route::group(['prefix' => 'learner'], function () {
        Route::group(['middleware' => 'auth_learner_login'], function () {
            Route::get('/', [LoginLearnerController::class, 'index'])->name('learner_login');
            Route::post('/', [LoginLearnerController::class, 'processLogin']);
            Route::post('/forgot-password', [LoginLearnerController::class, 'forgotPassword'])->name('learner_forgot_password');
            Route::get('/reset-password/{token}', [LoginLearnerController::class, 'resetPassword'])->name('learner_reset_password');
            Route::post('/reset-password/{token}', [LoginLearnerController::class, 'processResetPassword']);
        });
        Route::group(['middleware' => 'auth_learner'], function () {
            Route::group(['prefix' => 'class/{class}', 'middleware' => 'learner_class_access'], function () {
                Route::get('/', [LearnerController::class, 'learnerClass'])->name('learner_class');
                Route::post('/upload_post', [LearnerController::class, 'learnerUploadClassPost'])->name('learner_class_upload_post');
                Route::post('/upload_post_comment', [LearnerController::class, 'learnerUploadClassPostComment'])->name('learner_class_upload_post_comment');
                Route::post('/upload_post_like', [LearnerController::class, 'learnerUploadClassPostLike'])->name('learner_class_upload_post_like');

                Route::group(['middleware' => 'course_learner_access'], function () {
                    Route::get('/course/{course}', [CourseController::class, 'learnerClassCourse'])->name('learner_class_course');
                    Route::get('/course/{course}/learn', [CourseController::class, 'learnerClassCourseLearn'])->name('learner_class_course_learn');
                    Route::get('/course/{course}/learn/ticked/{block}', [CourseController::class, 'learnerClassCourseLearnTicked']);
                });


                Route::group(['middleware' => 'assignment_learner_access'], function () {
                    Route::get('/assignment/{assignment}', [AssignmentController::class, 'learnerClassAssignment'])->name('learner_class_assignment');
                    Route::post('/assignment/{assignment}', [AssignmentController::class, 'learnerSubmitClassAssignment']);
                });


                Route::group(['middleware' => 'poll_learner_access'], function () {
                    Route::get('/poll/{poll}', [PollController::class, 'learnerClassPoll'])->name('learner_class_poll');
                    Route::post('/poll/{poll}', [PollController::class, 'learnerSubmitClassPoll']);
                });

                Route::group(['middleware' => 'quiz_learner_access'], function () {
                    Route::get('/quiz/{quiz}', [QuizController::class, 'learnerClassQuiz'])->name('learner_class_quiz');
                    Route::post('/quiz/{quiz}', [QuizController::class, 'learnerSubmitClassQuiz']);
                });
            });


            Route::get('/timeline', [LearnerController::class, 'learnerDashboard'])->name('learner_dashboard');
            Route::get('/profile', [LearnerController::class, 'learnerProfile'])->name('learner_profile');
            Route::post('/profile', [LearnerController::class, 'updateLearnerProile']);


            Route::get('/classes', [LearnerController::class, 'learnerClasses'])->name('learner_classes');
            Route::post('/classes/join', [LearnerController::class, 'learnerJoinClass'])->name('learner_classes_join');
            Route::get('/classes-all', [LearnerController::class, 'allLearnerClasses']);

            Route::get('/activities', [LearnerController::class, 'learnerCourses'])->name('learner_courses');

            Route::get('/assignments', [LearnerController::class, 'learnerAssignments'])->name('learner_assignments');

            Route::get('/quizzes', [LearnerController::class, 'learnerQuizzes'])->name('learner_quizzes');

            Route::get('/polls', [LearnerController::class, 'learnerPolls'])->name('learner_polls');



            Route::get('/logout', [LearnerController::class, 'logout'])->name('learner_logout');
        });
    });
});

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/state-json/{country_id}', [LoginOrganization::class, 'stateJson']);
