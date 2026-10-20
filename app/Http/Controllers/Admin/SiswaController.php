<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Exports\SiswaExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // withCount supaya tombol sertifikat tahu siswa mana yang sudah tes
        $query = User::where('role', 'student')->withCount('tesResults');

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

    /**
     * Download sertifikat hasil tes milik siswa (versi admin).
     * Memakai template yang sama dengan sertifikat yang diunduh siswa.
     */
    public function downloadSertifikat(User $siswa)
    {
        if ($siswa->role !== 'student') {
            abort(404);
        }

        $hasil = $siswa->tesResults()
            ->latest('tanggal_tes')
            ->first();

        if (!$hasil) {
            return redirect()->route('admin.siswa.index')
                ->with('error', "{$siswa->name} belum menyelesaikan tes.");
        }

        $detailSkor = collect($hasil->detail_skor)
            ->sortByDesc('persentase')
            ->values();

        $pdf = Pdf::loadView('student.hasil.pdf', [
            'hasil' => $hasil,
            'detailSkor' => $detailSkor,
            'user' => $siswa,
        ])->setPaper('a4', 'landscape');


        return $pdf->download('Sertifikat-SIMPRODI-' . Str::slug($siswa->name) . '.pdf');
    }

    // TAMBAHKAN KODE EXPORT DI BAWAH INI

    public function exportExcel()
    {
        return Excel::download(
            new SiswaExport(),
            'data-siswa-simprodi.xlsx'
        );
    }

    public function exportCsv(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $output = fopen('php://output', 'w');

            fwrite($output, "\xEF\xBB\xBF");

            fputcsv($output, [
                'Nama Siswa',
                'Email',
                'Nomor Telepon',
                'Sekolah',
                'Tipe Sekolah',
                'Kelas',
                'Provinsi',
                'Jurusan',
                'Tanggal Daftar',
            ]);

            \App\Models\User::query()
                ->where('role', 'student')
                ->select([
                    'name',
                    'email',
                    'phone',
                    'school_name',
                    'school_type',
                    'class_level',
                    'province',
                    'major',
                    'created_at',
                ])
                ->orderBy('created_at', 'desc')
                ->chunk(500, function ($siswaList) use ($output) {
                    foreach ($siswaList as $siswa) {
                        fputcsv($output, [
                            $siswa->name,
                            $siswa->email,
                            $siswa->phone,
                            $siswa->school_name,
                            $siswa->school_type,
                            $siswa->class_level,
                            $siswa->province,
                            $siswa->major,
                            $siswa->created_at?->format('Y-m-d H:i:s'),
                        ]);
                    }
                });

            fclose($output);
        }, 'data-siswa-simprodi.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

}
