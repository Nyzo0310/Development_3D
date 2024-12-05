<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:8',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => $request->password, // Plain password; hashed automatically via mutator
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully!');
    }
}
