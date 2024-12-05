<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;

// Route to display the login page (GET)
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Route to handle login form submission (POST)
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');


