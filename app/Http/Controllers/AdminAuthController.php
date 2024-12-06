<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); // Login form view
    }

    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // If successful, redirect to the admin dashboard
            return redirect()->route('admin.dashboard')->with('login_success', 'Welcome to the Admin Dashboard!');
        }

        // If login fails, redirect back with errors
        return back()->withErrors(['login_error' => 'Invalid username or password.']);
    }

    public function showDashboard()
    {
        return view('admin.dashboard'); // Admin dashboard view
    }
}
