<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');

// routes/web.php
Route::get('/password/reset', 'App\Http\Controllers\PasswordResetController@showResetForm')->name('password.request');
Route::post('/password/reset', 'App\Http\Controllers\PasswordResetController@sendResetLink')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\PasswordResetController@showResetPasswordForm')->name('password.reset');
Route::post('/password/reset/{token}', 'App\Http\Controllers\PasswordResetController@resetPassword')->name('password.update');

