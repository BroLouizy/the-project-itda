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
            'Jurusan',
            'Tanggal Daftar',
        ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->name,
            $siswa->email,
            $siswa->phone,
            $siswa->school_name,
            $siswa->school_type,
            $siswa->class_level,
            $siswa->province,
            $siswa->major,
            $siswa->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
