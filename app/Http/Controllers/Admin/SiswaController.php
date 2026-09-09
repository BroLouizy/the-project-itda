<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'student');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('school_name', 'like', "%{$search}%");
            });
        }

        $siswa = $query->latest()->paginate(10)->withQueryString();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function edit(User $siswa)
    {
        if ($siswa->role !== 'student') {
            abort(404);
        }

        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, User $siswa)
    {
        if ($siswa->role !== 'student') {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:users,email,' . $siswa->id,
            'school_name' => 'required|string|max:150',
            'province' => 'required|string|max:100',
            'school_type' => 'required|in:SMA,SMK,MA,MAK',
            'class_level' => 'required|in:X,XI,XII',
            'major' => 'required|string|max:100',
        ]);

        $siswa->update($request->only([
            'name', 'phone', 'email', 'school_name',
            'province', 'school_type', 'class_level', 'major',
        ]));

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(User $siswa)
    {
        if ($siswa->role !== 'student') {
            abort(404);
        }

        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
    public function resetPassword(Request $request, User $siswa)
    {
        $request->validate([
            'new_password' => 'required|min:6',
        ]);

        $siswa->password = Hash::make($request->new_password);
        $siswa->save();

        return redirect()->route('admin.siswa.edit', $siswa->id)
            ->with('success', "Password untuk {$siswa->name} berhasil direset.");
    }
}
