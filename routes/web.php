<?php

use Illuminate\Support\Facades\Route;

Route::get('/h', function () {
    return view('pages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
