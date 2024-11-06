<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('students.index');
})->name('index');

// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/loginUser', [AuthController::class, 'userLogin'])->name('user.login');
Route::post('/registerUser', [AuthController::class, 'userRegister'])->name('user.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create')->middleware('creator');
Route::post('/students', [StudentController::class, 'store'])->name('students.store')->middleware('creator');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit')->middleware('updater');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update')->middleware('updater');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy')->middleware('deleter');

// Post Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('creator');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('creator');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('updater');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('updater');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('deleter');
