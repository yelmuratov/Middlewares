<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('register');
    }

   public function userLogin(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password', 'role'))) {
            return redirect()->route('students.index')->with('success', 'Logged in successfully');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function userRegister(RegisterRequest $request)
    {       
        User::create($request->all());
        return redirect()->route('login')->with('success', 'User created successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
