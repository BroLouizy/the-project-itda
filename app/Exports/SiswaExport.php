<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SiswaExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    public function query()
    {
        return User::query()
            ->where('role', 'student')
            ->with([
                'tesResults' => function ($query) {
                    $query->orderByDesc('tanggal_tes')
                        ->orderByDesc('id');
                },
            ])
            ->select([
                'id',
                'name',
                'email',
                'phone',
                'school_name',
                'school_type',
                'class_level',
                'province',
                'city',
                'major',
                'created_at',
            ])
            ->orderByDesc('created_at');
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Email',
            'Nomor Telepon',
            'Sekolah',
            'Tipe Sekolah',
            'Kelas',
            'Provinsi',
            'Kabupaten/Kota',
            'Jurusan',
            'Tanggal Daftar',
            'Jurusan Pilihan 1',
            'Persentase 1 (%)',
            'Jurusan Pilihan 2',
            'Persentase 2 (%)',
            'Jurusan Pilihan 3',
            'Persentase 3 (%)',
        ];
    }

    public function map($siswa): array
    {
        $hasilTerakhir = $siswa->tesResults->first();

        $top3 = collect($hasilTerakhir?->detail_skor ?? [])
            ->sortByDesc('persentase')
            ->take(3)
            ->values();

        $jurusan1 = $top3->get(0, []);
        $jurusan2 = $top3->get(1, []);
        $jurusan3 = $top3->get(2, []);

        return [
            $siswa->name,
            $siswa->email,
            $siswa->phone,
            $siswa->school_name,
            $siswa->school_type,
            $siswa->class_level,
            $siswa->province,
            $siswa->city,
            $siswa->major,
            $siswa->created_at?->format('Y-m-d H:i:s'),
            $jurusan1['nama_jurusan'] ?? '',
            isset($jurusan1['persentase']) ? (float) $jurusan1['persentase'] : '',
            $jurusan2['nama_jurusan'] ?? '',
            isset($jurusan2['persentase']) ? (float) $jurusan2['persentase'] : '',
            $jurusan3['nama_jurusan'] ?? '',
            isset($jurusan3['persentase']) ? (float) $jurusan3['persentase'] : '',
        ];
    }
}
