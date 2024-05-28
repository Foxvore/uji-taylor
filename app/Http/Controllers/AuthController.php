<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function loginView()
    {
        return view('login');
    }

    public function authLogin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = DB::table('m_admin')->where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Authentication passed, create session manually
            Auth::loginUsingId($admin->id_admin);
            return redirect()->intended('dashboard');
        }

        // If the login attempt failed, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid credentials')->withInput();
    }
}
