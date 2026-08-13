<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgotPasswordOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

public function sendResetOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'Email tidak ditemukan.'
        ])->withInput();
    }

    // Hapus OTP lama
    DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->delete();

    // Buat OTP 6 digit
    $otp = random_int(100000, 999999);

    // Simpan OTP
    DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => Hash::make($otp),
        'created_at' => now(),
        'expires_at' => now()->addMinutes(10),
    ]);

    // Kirim OTP ke email pengguna
    Mail::to($user->email)->send(
    new ForgotPasswordOtpMail($otp)
);

session([
    'reset_email' => $request->email,
]);

return redirect()
    ->route('password.otp')
    ->with('success', 'Kode OTP sudah dikirim ke email Anda.');
}

public function showOtp()
{
    return view('auth.verify-otp');
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6',
    ]);

    $email = session('reset_email');

    if (!$email) {
        return redirect()
            ->route('password.request')
            ->withErrors([
                'email' => 'Sesi reset password sudah berakhir.'
            ]);
    }

    $reset = DB::table('password_reset_tokens')
        ->where('email', $email)
        ->first();

    if (!$reset) {
        return back()->withErrors([
            'otp' => 'Kode OTP tidak ditemukan.'
        ]);
    }

    if ($reset->expires_at && now()->greaterThan($reset->expires_at)) {
        DB::table('password_reset_tokens')
            ->where('email', $email)
            ->delete();

        return back()->withErrors([
            'otp' => 'Kode OTP sudah kedaluwarsa.'
        ]);
    }

    if (!Hash::check($request->otp, $reset->token)) {
        return back()->withErrors([
            'otp' => 'Kode OTP salah.'
        ]);
    }

    session([
        'reset_verified' => true,
        'reset_email' => $email,
    ]);

    return redirect()->route('password.reset');
}

public function showResetPassword()
{
    if (!session('reset_verified')) {
        return redirect()->route('password.request');
    }

    return view('auth.reset-password');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:8|confirmed',
    ]);

    if (!session('reset_verified')) {
        return redirect()->route('password.request');
    }

    $email = session('reset_email');

    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->route('password.request')
            ->withErrors([
                'email' => 'Akun tidak ditemukan.'
            ]);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    // Hapus OTP
    DB::table('password_reset_tokens')
        ->where('email', $email)
        ->delete();

    // Hapus session reset
    session()->forget([
        'reset_email',
        'reset_verified',
    ]);

    return redirect('/login')->with(
        'success',
        'Password berhasil diubah! Silakan login dengan password baru.'
    );
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