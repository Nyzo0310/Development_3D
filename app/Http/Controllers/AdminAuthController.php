<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Define the rate limiter key based on the user's IP
        $key = 'login_attempts:' . $request->ip();
        $maxAttempts = 5; // Maximum login attempts
        $decayMinutes = 1; // Lockout time in minutes

        // Check if the user has exceeded the allowed login attempts
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'error' => 'Too many login attempts. Please try again in ' . $seconds . ' seconds.',
            ]);
        }

        // Attempt to authenticate the user
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Clear the rate limiter attempts on successful login
            RateLimiter::clear($key);

            // Flash a success message to the session for SweetAlert
            session()->flash('login_success', 'Login Successful! Welcome to your dashboard.');

            // Redirect to the intended route or admin dashboard
            return redirect()->intended('/admin/dashboard');
        }

        // Increment the rate limiter attempts on failed login
        RateLimiter::hit($key, $decayMinutes * 60);

        // Return an error response for invalid credentials
        return back()->withErrors(['error' => 'Invalid credentials.']);
    }
}
