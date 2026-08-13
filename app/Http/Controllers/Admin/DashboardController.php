<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TesResult;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role', 'student')->count();
        $hasilTes = TesResult::with(['user', 'jurusanRekomendasi'])
            ->latest('tanggal_tes')
            ->paginate(10);

        return view('admin.dashboard', compact('totalSiswa', 'hasilTes'));
    }
}