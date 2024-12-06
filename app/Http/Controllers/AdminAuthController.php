<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in
        $credentials = $request->only('username', 'password');

        // Use default Auth without specifying the guard
        if (Auth::attempt($credentials)) {
            // If successful, redirect to the admin dashboard
            return redirect()->route('admin.dashboard')->with('login_success', 'Welcome to the Admin Dashboard!');
        }

        // If login fails, redirect back with errors
        return back()->withErrors(['login_error' => 'Invalid username or password.']);
    }

    public function showDashboard()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        return view('admin.dashboard', compact('user')); // Admin dashboard view with user data
    }

    public function showAttendance()
    {
        return view('admin.attendance'); // Make sure this file exists: resources/views/admin/attendance.blade.php
    }

    public function showEmployeeList()
    {
        return view('admin.employee-list');
    }

    public function showOvertime()
    {
        return view('admin.overtime');
    }

    public function showCashAdvance()
    {
        return view('admin.cash-advance');
    }

    public function showSchedules()
    {
        return view('admin.schedules');
    }

    public function showDeductions()
    {
        return view('admin.deductions');
    }

    public function showPositions()
    {
        return view('admin.positions');
    }
}
