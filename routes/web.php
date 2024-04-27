<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GroupController;
use App\Models\Comment;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/login', [AuthController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/group', [GroupController::class, 'index'])->name('group.index');
    Route::post('/group', [GroupController::class, 'store'])->name('group.store');
    Route::get('/group/{groupId}/list', [GroupController::class, 'list'])->name('group.list');
    Route::get('/group/{groupId}', [GroupController::class, 'show'])->name('group.show');
    Route::post('/group/{groupId}/edit', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/group/{groupId}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('/group/{groupId}', [GroupController::class, 'delete'])->name('group.delete');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/{postId}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{postId}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{postId}', [CommentController::class, 'create'])->name('comment.create');
    Route::get('/comment/{commentId}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{commentId}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
