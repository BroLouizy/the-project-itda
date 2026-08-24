<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('student.setting', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'school_name' => 'required|string|max:150',
            'province' => 'required|string|max:100',
            'school_type' => 'required|in:SMA,SMK,MA,MAK',
            'class_level' => 'required|in:X,XI,XII',
            'major' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->school_name = $request->school_name;
        $user->province = $request->province;
        $user->school_type = $request->school_type;
        $user->class_level = $request->class_level;
        $user->major = $request->major;

        if ($request->hasFile('photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->route('student.setting')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}