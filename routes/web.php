<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{
    MainController,
    UserController,
    TagController,
    DepartmentController,
    QuestionnaireController
};

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

Route::middleware('auth')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resources([
        'tags' => TagController::class,
        'departments' => DepartmentController::class,
        'questionnaires' => QuestionnaireController::class
    ]);

    Route::resource('users', UserController::class)->only([
        'index'
    ]);
    Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login_post');
});
