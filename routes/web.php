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


Route::get('/', function () {
    return view('welcome');
});

//Subjects & Topics
Route::resource('subjects', SubjectController::class);
Route::get('/subjects/{subject}/quizzes', [SubjectController::class,'showQuizzes'])->name('subject.quizzes');
Route::get('/subjects/{subject}', [SubjectController::class,'show'])->name('subjects.show');
Route::get('/subjects/{subject}/certificate', [CertificateController::class,'download'])->name('certificate.download');

Route::resource('topics', TopicController::class);
Route::get('{id}/topics/create', [App\Http\Controllers\TopicController::class, 'create'])->name('topics.create');

Route::post('{id}/topics', [App\Http\Controllers\TopicController::class, 'store'])->name('topics.store');

// Quizzes
 Route::resource('quizzes', QuizController::class);
//  Route::get('{id}/quizzes/create', [App\Http\Controllers\QuizController::class, 'create'])->name('quizzes.create');

// Route::post('{id}/quizzes', [App\Http\Controllers\QuizController::class, 'store'])->name('quizzes.store');

// Route::resource('quizzes.questions', 'QuestionController');
// Route::resource('quizzes.questions.answers', 'AnswerController');
Route::get('/quiz/{Id}', [QuizController::class, 'generateQuiz'])->name('quiz.generate');
Route::post('/quiz/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/subjects/{subject}/quizzes/{quiz}', [QuizController::class, 'showQuizz'])->name('subject.quiz.show');

// questions
Route::resource('questions', QuestionController::class);
Route::get('{id}/questions/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('questions.create');

Route::post('{id}/questions', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');

Route::delete('questions_mass_destroy', [\App\Http\Controllers\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');
Route::post('/questions/{id}/store-options', [\App\Http\Controllers\QuestionController::class, 'storeOptions'])->name('questions.storeOptions');

//Options
Route::resource('options', OptionController::class);
Route::get('{id}/options/create', [App\Http\Controllers\OptionController::class, 'create'])->name('options.create');

Route::post('{id}/options', [App\Http\Controllers\OptionController::class, 'store'])->name('options.store');

// Admin_user
 Route::resource('admin_users', AdminUserController::class);
// Route::group(['middleware' => 'auth'], function () {
  
//     // Admin-only routes
//     Route::get('/admin', function () {
//         return 'Welcome, Admin!';
//     });
//      // Add middleware 'auth' to ensure only authenticated users can access these routes

//     // List Admin Users
//     Route::get('/admin-users', [AdminUserController::class,'index'])->name('admin.users.index');

//     // Show Admin User Creation Form
//     Route::get('/admin-users/create', [AdminUserController::class,'create'])->name('admin.users.create');

//     // Store New Admin User
//     Route::post('/admin-users', [AdminUserController::class,'store'])->name('admin.users.store');

//     // Show Admin User Details
//     Route::get('/admin-users/{id}', [AdminUserController::class,'show'])->name('admin.users.show');

//     // Show Admin User Editing Form
//     Route::get('/admin-users/{id}/edit', [AdminUserController::class,'edit'])->name('admin.users.edit');

//     // Update Admin User
//     Route::put('/admin-users/{id}', [AdminUserController::class,'update'])->name('admin.users.update');

//     // Delete Admin User
//     Route::delete('/admin-users/{id}', [AdminUserController::class,'destroy'])->name('admin.users.destroy');

// });


// Route::group(['middleware' => ['auth', 'checkrole:superadmin']], function () {
//     // Routes for superadmin users only
// });



Route::get('login', function () { return view('pages.user-pages.login'); });
  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
