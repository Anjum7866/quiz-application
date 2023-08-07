<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizResultController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/', HomeController::class);
Route::get('/get-topic-details/{topicId}', [TopicController::class,'getDetails']);
Route::get('/user-login', [LoginController::class,'showLoginForm'])->name('user-login');
Route::post('/user-login', [LoginController::class,'userlogin'])->name('user.userlogin');

Route::post('/store-intended-url', [LoginController::class, 'storeIntendedUrl']);

// Route::get('/test-session', function () {
//     $intendedUrl = request()->headers->get('referer');
//     return redirect()->to($intendedUrl); 
// });

Route::get('/allsubjects',  [SubjectController::class,'showSubjects']);
Route::get('/singlesubject/{subject}', [SubjectController::class,'showSingleSubject'])->name('subject.showSingleSubject');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/teacher', function () {
    return view('teacher');
})->name('teacher');
Route::get('/price', function () {
    return view('price');
})->name('price');
Route::get('/review', function () {
    return view('review');
})->name('review');

Route::middleware(CheckRole::class.':superadmin')->group(function () {
    Route::get('/superadmin', function () {
        return 'Welcome, SuperAdmin!';
    });
    Route::get('/admin/users', [AdminUserController::class, 'manageUsers']);
     Route::resource('admin_users', AdminUserController::class);
    Route::get('/admin-users', [AdminUserController::class,'index'])->name('admin.users.index');
    Route::get('/admin-users/create', [AdminUserController::class,'create'])->name('admin.users.create');
    Route::post('/admin-users', [AdminUserController::class,'store'])->name('admin.users.store');
    Route::get('/admin-users/{id}', [AdminUserController::class,'show'])->name('admin.users.show');
    Route::get('/admin-users/{id}/edit', [AdminUserController::class,'edit'])->name('admin.users.edit');
    Route::put('/admin-users/{id}', [AdminUserController::class,'update'])->name('admin.users.update');
    Route::delete('/admin-users/{id}', [AdminUserController::class,'destroy'])->name('admin.users.destroy');
});

Route::prefix('org')->middleware(CheckRole::class.':admin')->group(function () {
    Route::get('/admin', function () {
        return 'Welcome, Admin!';
    });
    Route::get('/admin/users', [AdminUserController::class, 'manageUsers']);
    Route::resource('admin_users', AdminUserController::class);
   Route::get('/admin-users', [AdminUserController::class,'index'])->name('admin.users.index');
   Route::get('/admin-users/create', [AdminUserController::class,'create'])->name('admin.users.create');
   Route::post('/admin-users', [AdminUserController::class,'store'])->name('admin.users.store');
   Route::get('/admin-users/{id}', [AdminUserController::class,'show'])->name('admin.users.show');
   Route::get('/admin-users/{id}/edit', [AdminUserController::class,'edit'])->name('admin.users.edit');
   Route::put('/admin-users/{id}', [AdminUserController::class,'update'])->name('admin.users.update');
   Route::delete('/admin-users/{id}', [AdminUserController::class,'destroy'])->name('admin.users.destroy');

    Route::get('/subject/{subject}', [SubjectController::class,'showSingle'])->name('subject.showSingle');
    Route::resource('subjects', SubjectController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('quizzes', QuizController::class);
    Route::get('/quizzes/create/{quizId}', [QuizController::class,'createTopicQuiz'])->name('topic.createTopicQuiz');
    Route::post('/topicquizzes/{quizId}', [QuizController::class, 'storequiz'])->name('topics.storequiz');
    
    Route::resource('questions', QuestionController::class);
    Route::get('/subjects/{subject}', [SubjectController::class,'show'])->name('subjects.show');
    Route::get('{id}/questions/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('questions.create');
    Route::post('{id}/questions', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
    
    Route::delete('questions_mass_destroy', [\App\Http\Controllers\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');
    Route::post('/questions/{id}/store-options', [\App\Http\Controllers\QuestionController::class, 'storeOptions'])->name('questions.storeOptions');
    
    Route::resource('options', OptionController::class);
    Route::get('{id}/options/create', [App\Http\Controllers\OptionController::class, 'create'])->name('options.create');
    
    Route::post('{id}/options', [App\Http\Controllers\OptionController::class, 'store'])->name('options.store');
    

   
});
Route::get('/admin/login', function () { return view('admin.login'); });
Route::get('/admin/register', function () { return view('admin.register'); });

Route::get('/check-login', [LoginController::class,'checkLogin']);



      
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('/profile/{profile}', [UserProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/{profile}/edit', [UserProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile/{profile}', [UserProfileController::class,'update'])->name('profile.update');
    Route::get('/change-password', [ChangePasswordController::class, 'edit'])->name('change.password');
    Route::post('/change-password', [ChangePasswordController::class, 'update']);
    // Route::get('/subjects/{subject}/quizzes', [SubjectController::class,'showQuizzes'])->name('subject.quizzes');
    Route::get('/quizhistory', [QuizResultController::class,'index'])->name('subject.quizhistory');
    Route::get('/checkanswers/{quizId}/',[QuizResultController::class,'checkanswers'])->name('checkanswers');
    Route::get('/topics/{topic}/quizzes', [TopicController::class,'showQuizzes'])->name('topic.quizzes');
    
    Route::get('/certificate', function () { return view('certificate'); });
    Route::get('/answered-quiz-history', [QuizResultController::class, 'index'])->name('answered-quiz-history');
    Route::get('/subjects/{subject}/certificate', [CertificateController::class,'download'])->name('certificate.download');
    Route::get('{id}/topics/create', [App\Http\Controllers\TopicController::class, 'create'])->name('topics.create');
    Route::post('{id}/topics', [App\Http\Controllers\TopicController::class, 'store'])->name('topics.store');
    
    Route::get('/subjects/{subject}/quizzes/{quiz}', [QuizController::class, 'showQuizz'])->name('subject.quiz.show');
    Route::get('/quiz/history', 'QuizResultController@index')->name('quiz.history');
    Route::get('/quiz/{Id}', [QuizController::class, 'generateQuiz'])->name('quiz.generate');
    // Route::post('/quiz/{Id}', [QuizController::class, 'submitQuiz'])->name('quiz.submit');

    Route::get('/{id}',  [HomeController::class, 'subjects']);
    Route::post('/{id}', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/subjects/{subjectId}', [SubjectController::class,'showQuizzes'])->name('subject.quizzes');
    
});





