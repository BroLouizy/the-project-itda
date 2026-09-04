<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use App\Models\OpsiJawaban;
use App\Models\JurusanKuliah;
use App\Models\TesResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesController extends Controller
{
    protected $totalSoal = 50;

    public function mulai()
    {
        session()->forget('jawaban_tes');
        session(['jawaban_tes' => []]);

        return redirect()->route('tes.soal', ['nomor' => 1]);
    }

    public function soal($nomor)
    {
        $nomor = (int) $nomor;

        if ($nomor < 1 || $nomor > $this->totalSoal) {
            return redirect()->route('student.dashboard');
        }

        $pertanyaan = Pertanyaan::where('nomor_urut', $nomor)
            ->with('opsiJawabans')
            ->firstOrFail();

        $jawabanTersimpan = session('jawaban_tes', []);

        return view('student.tes.soal', [
            'pertanyaan' => $pertanyaan,
            'nomor' => $nomor,
            'total' => $this->totalSoal,
            'jawabanTerpilih' => $jawabanTersimpan[$nomor] ?? null,
        ]);
    }

    public function jawab(Request $request, $nomor)
    {
        $nomor = (int) $nomor;

        $request->validate([
            'opsi_id' => 'required|exists:opsi_jawabans,id',
        ]);

        $jawaban = session('jawaban_tes', []);
        $jawaban[$nomor] = $request->opsi_id;
        session(['jawaban_tes' => $jawaban]);

        if ($nomor >= $this->totalSoal) {
            return redirect()->route('tes.selesai');
        }

        return redirect()->route('tes.soal', ['nomor' => $nomor + 1]);
    }

    public function selesai()
    {
        $jawaban = session('jawaban_tes', []);

        if (count($jawaban) < $this->totalSoal) {
            return redirect()->route('tes.mulai');
        }

        $kemunculan = OpsiJawaban::selectRaw('jurusan_kuliah_id, COUNT(*) as total')
            ->groupBy('jurusan_kuliah_id')
            ->pluck('total', 'jurusan_kuliah_id');

        $opsiTerpilih = OpsiJawaban::whereIn('id', array_values($jawaban))->get();

        $jawabanPerJurusan = [];
        foreach ($opsiTerpilih as $opsi) {
            $jid = $opsi->jurusan_kuliah_id;
            $jawabanPerJurusan[$jid] = ($jawabanPerJurusan[$jid] ?? 0) + 1;
        }

        $jurusanList = JurusanKuliah::all()->keyBy('id');

        $skor = [];
        foreach ($kemunculan as $jurusanId => $total) {
            $dipilih = $jawabanPerJurusan[$jurusanId] ?? 0;
            $persentase = $total > 0 ? round(($dipilih / $total) * 100, 2) : 0;

            $skor[] = [
                'jurusan_id' => $jurusanId,
                'nama_jurusan' => $jurusanList[$jurusanId]->nama_jurusan ?? '-',
                'jawaban_dipilih' => $dipilih,
                'total_kemunculan' => $total,
                'persentase' => $persentase,
            ];
        }

        usort($skor, fn($a, $b) => $b['persentase'] <=> $a['persentase']);

        $rekomendasiUtama = $skor[0];

        TesResult::create([
            'user_id' => Auth::id(),
            'jurusan_rekomendasi_id' => $rekomendasiUtama['jurusan_id'],
            'persentase' => $rekomendasiUtama['persentase'],
            'detail_skor' => $skor,
            'tanggal_tes' => now(),
        ]);

        session()->forget('jawaban_tes');

        return redirect()->route('hasil.tes');
    }
}