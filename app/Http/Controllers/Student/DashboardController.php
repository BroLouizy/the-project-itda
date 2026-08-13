<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sudahTes = $user->tesResults()->exists();
        $hasilTerakhir = $user->tesResults()->latest('tanggal_tes')->first();

        return view('student.dashboard', compact('user', 'sudahTes', 'hasilTerakhir'));
    }
}