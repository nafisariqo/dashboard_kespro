<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JudulController;
use App\Http\Middleware\AuthMiddleware; 

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


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login-index');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::middleware([AuthMiddleware::class])->group(function(){
    
    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard-index')->middleware('auth');
    
    //admin
    Route::get('admin', [AdminController::class, 'index'])->name('admin-index')->middleware('auth');
    
    //artikel
    Route::get('artikel', [ArtikelController::class, 'index'])->name('artikel-index');
    Route::get('artikel/create', [ArtikelController::class, 'create'])->name('artikel-create');
    Route::post('artikel/store', [ArtikelController::class, 'store'])->name('artikel-store');
    Route::get('artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel-update');
    Route::get('artikel/show/{id}', [ArtikelController::class, 'show'])->name('artikel-show');
    Route::get('artikel/delete/{id}', [ArtikelController::class, 'destroy']);
    
    //komen
    Route::get('komen', [KomenController::class, 'index'])->name('komen-index');
    
    //quiz
    Route::get('quiz', [QuizController::class, 'index'])->name('quiz-index');
    Route::get('quiz/create', [QuizController::class, 'create'])->name('quiz-create');
    Route::post('quiz/store', [QuizController::class, 'store'])->name('quiz-store');
    Route::get('quiz/update/{id}', [QuizController::class, 'update'])->name('quiz.update');
    Route::post('quiz/edit/{id}', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::get('delete/{id}', [QuizController::class, 'destroy']);

    //judul
    Route::get('judul/create', [JudulController::class, 'create'])->name('judul-create');
    Route::post('judul/store', [JudulController::class, 'store'])->name('judul-store');
    Route::get('judul/ubah/{id}', [QuizController::class, 'ubah'])->name('judul.update');
    Route::post('judul/modif/{id}', [QuizController::class, 'modif'])->name('judul.edit');

    //user 
    Route::get('user', [UserController::class, 'index'])->name('user-index');

    //vidio
    Route::get('vidio', [VidioController::class, 'index'])->name('vidio-index');
    Route::get('vidio/create', [VidioController::class, 'create'])->name('vidio-create');
    Route::get('vidio/update/{id}', [VidioController::class, 'update'])->name('vidio-update');
    Route::post('vidio/edit/{id}', [VidioController::class, 'edit'])->name('vidio.edit');
    Route::post('vidio/store', [VidioController::class, 'store'])->name('vidio-store');
    Route::get('vidio/show/{id}', [VidioController::class, 'show'])->name('penjelasan-show');
    Route::get('vidio/delete/{id}', [VidioController::class, 'delete']);

    //webinar
    Route::get('webinar', [WebinarController::class, 'index'])->name('webinar-index');
    Route::get('webinar/create', [WebinarController::class, 'create'])->name('webinar-create');
    Route::post('webinar/store', [WebinarController::class, 'store'])->name('webinar-store');
    Route::get('webinar/update/{id}', [WebinarController::class, 'update'])->name('webinar-update');
    Route::post('webinar/edit/{id}', [WebinarController::class, 'edit'])->name('webinar.edit');
    Route::get('delete/{id}', [WebinarController::class, 'destroy']);

    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
});


