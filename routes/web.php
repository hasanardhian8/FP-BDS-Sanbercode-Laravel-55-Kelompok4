<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;


Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/login', [AuthController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    // Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    // Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    // Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    // Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    // Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
    // Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
