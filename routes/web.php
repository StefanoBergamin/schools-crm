<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('schools', SchoolController::class);
    Route::resource('students', StudentController::class);
});

Auth::routes(['register' => false]);