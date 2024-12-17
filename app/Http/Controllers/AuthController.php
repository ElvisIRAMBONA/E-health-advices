<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login logic
    public function login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page or home
            return redirect()->intended('home')->with('success', 'You are logged in!');
        }

        // Authentication failed, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration logic
    public function register(Request $request)
    {
        // Validate the registration form data
        $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to intended page or home
        return redirect()->intended('home')->with('success', 'Registration successful! You are logged in.');
    }
}