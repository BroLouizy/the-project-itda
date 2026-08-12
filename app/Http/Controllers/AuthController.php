<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:users,email',
            'school_name' => 'required|string|max:150',
            'province' => 'required|string|max:100',
            'school_type' => 'required|in:SMA,SMK,MA,MAK',
            'class_level' => 'required|in:X,XI,XII',
            'major' => 'required|string|max:100',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'school_name' => $request->school_name,
            'province' => $request->province,
            'school_type' => $request->school_type,
            'class_level' => $request->class_level,
            'major' => $request->major,
            'password' => Hash::make($request->password),
            'role' => 'student',
        ]);

        return redirect('/login')->with(
            'success',
            'Pendaftaran berhasil! Silakan login.'
        );
    }

    // INI METHOD LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // INI METHOD LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}