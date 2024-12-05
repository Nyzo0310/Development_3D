<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Customize credentials to use 'username'
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('admin.dashboard')
                ->with('login_success', 'Welcome to the Admin Dashboard!');
        }

        // Authentication failed
        return back()->withErrors(['login_error' => 'Invalid username or password.']);
    }
}
