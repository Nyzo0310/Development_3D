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

// Update the existing route to use the AdminAuthController and pass authenticated user data
Route::get('/admin/dashboard', [AdminAuthController::class, 'showDashboard'])
    ->name('admin.dashboard');

// Auth Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Attendance Route
Route::get('/admin/attendance', [AdminAuthController::class, 'showAttendance'])->name('admin.attendance');

// Employee Management Routes
Route::get('/admin/employees/list', [AdminAuthController::class, 'showEmployeeList'])->name('admin.employees.list');
Route::get('/admin/employees/overtime', [AdminAuthController::class, 'showOvertime'])->name('admin.employees.overtime');
Route::get('/admin/employees/cash-advance', [AdminAuthController::class, 'showCashAdvance'])->name('admin.employees.cash_advance');
Route::get('/admin/employees/schedules', [AdminAuthController::class, 'showSchedules'])->name('admin.employees.schedules');

// Deductions and Positions
Route::get('/admin/deductions', [AdminAuthController::class, 'showDeductions'])->name('admin.deductions');
Route::get('/admin/positions', [AdminAuthController::class, 'showPositions'])->name('admin.positions');
