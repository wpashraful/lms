<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('lead', LeadController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::get('/admission', [AdmissionController::class, 'search'])->name('admission');
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice-index');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice-show');
    Route::get('/invoice-edit/{id}', [InvoiceController::class, 'edit'])->name('invoice-edit');
    Route::resource('course', CourseController::class);
    Route::resource('curricula', CurriculumController::class);

    Route::resource('question', QuestionController::class);
    Route::resource('quizz', QuizzController::class);
    Route::get('/quizz-show/{id}', [QuizzController::class, 'quizzShow'])->name('quizz-show');

});

require __DIR__.'/auth.php';
