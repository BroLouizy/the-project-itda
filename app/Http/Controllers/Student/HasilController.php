<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hasil = $user->tesResults()->latest('tanggal_tes')->first();

        if (!$hasil) {
            return redirect()->route('student.dashboard');
        }

        $detailSkor = collect($hasil->detail_skor)->sortByDesc('persentase')->values();

        return view('student.hasil.index', [
            'hasil' => $hasil,
            'detailSkor' => $detailSkor,
        ]);
    }
}