<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use App\Models\JurusanKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::with('opsiJawabans.jurusanKuliah')
            ->orderBy('nomor_urut')
            ->paginate(10);

        return view('admin.pertanyaan.index', compact('pertanyaans'));
    }

    public function edit(Pertanyaan $pertanyaan)
    {
        $pertanyaan->load('opsiJawabans');
        $jurusanList = JurusanKuliah::orderBy('nama_jurusan')->get();

        return view('admin.pertanyaan.edit', compact('pertanyaan', 'jurusanList'));
    }

    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $request->validate([
            'teks_pertanyaan' => 'required|string',
            'opsi.*.jurusan_kuliah_id' => 'required|exists:jurusan_kuliahs,id',
            'opsi.*.gambar' => 'nullable|image|mimes:jpg,jpeg,png,jpe|max:2048',
        ]);

        $pertanyaan->update([
            'teks_pertanyaan' => $request->teks_pertanyaan,
        ]);

        foreach ($pertanyaan->opsiJawabans as $opsi) {
            $data = $request->opsi[$opsi->id] ?? null;

            if (!$data) continue;

            $opsi->jurusan_kuliah_id = $data['jurusan_kuliah_id'];

            if ($request->hasFile("opsi.{$opsi->id}.gambar")) {
                if ($opsi->gambar_opsi) {
                    Storage::disk('public')->delete($opsi->gambar_opsi);
                }

                $path = $request->file("opsi.{$opsi->id}.gambar")->store('soal/' . $pertanyaan->nomor_urut, 'public');
                $opsi->gambar_opsi = $path;
            }

            $opsi->save();
        }

        return redirect()->route('admin.pertanyaan.index')
            ->with('success', "Soal nomor {$pertanyaan->nomor_urut} berhasil diperbarui.");
    }
}