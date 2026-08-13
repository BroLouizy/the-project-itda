<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;

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

        $user = User::create([
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

Mail::to($user->email)->send(
    new RegistrationSuccessMail($user)
);

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
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('student.dashboard');
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
public function showForgotPassword()
{
    return view('auth.forgot-password');
}

public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
        return back()->with(
            'success',
            'Link reset password sudah dikirim ke email.'
        );
    }

    return back()->withErrors([
        'email' => 'Email tidak ditemukan.',
    ]);
}
    }