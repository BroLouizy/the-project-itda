<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TesResult;
use Illuminate\Http\Request;

class HasilTesController extends Controller
{
    public function index(Request $request)
    {
        $query = TesResult::with(['user', 'jurusanRekomendasi']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('school_name', 'like', "%{$search}%");
            });
        }

        $hasilTes = $query->latest('tanggal_tes')->paginate(10)->withQueryString();

        return view('admin.hasil.index', compact('hasilTes'));
    }

    public function show(TesResult $hasil)
    {
        $hasil->load(['user', 'jurusanRekomendasi']);

        $detailSkor = collect($hasil->detail_skor)->sortByDesc('persentase')->values();

        return view('admin.hasil.show', compact('hasil', 'detailSkor'));
    }
}