<?php

namespace Database\Seeders;

use App\Models\JurusanKuliah;
use Illuminate\Database\Seeder;

class JurusanKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $jurusans = [
            ['kode' => 'TD',   'nama_jurusan' => 'S1 Teknik Dirgantara'],
            ['kode' => 'TM',   'nama_jurusan' => 'S1 Teknik Mesin'],
            ['kode' => 'AERO', 'nama_jurusan' => 'D3 Aeronautika'],
            ['kode' => 'TI',   'nama_jurusan' => 'S1 Teknik Industri'],
            ['kode' => 'IF',   'nama_jurusan' => 'S1 Informatika'],
            ['kode' => 'TE',   'nama_jurusan' => 'S1 Teknik Elektro'],
            ['kode' => 'MNJ',  'nama_jurusan' => 'S1 Manajemen'],
            ['kode' => 'HKM',  'nama_jurusan' => 'S1 Hukum'],
            ['kode' => 'FAR',  'nama_jurusan' => 'D3 Farmasi'],
            ['kode' => 'GIZ',  'nama_jurusan' => 'D3 Gizi'],
            ['kode' => 'RAD',  'nama_jurusan' => 'D3 Radiologi'],
        ];

        foreach ($jurusans as $j) {
            JurusanKuliah::updateOrCreate(
                ['nama_jurusan' => $j['nama_jurusan']],
                ['nama_jurusan' => $j['nama_jurusan']]
            );
        }
    }
}