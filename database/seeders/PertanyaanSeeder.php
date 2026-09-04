<?php

namespace Database\Seeders;

use App\Models\JurusanKuliah;
use App\Models\Pertanyaan;
use App\Models\OpsiJawaban;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping kode CSV -> nama_jurusan di database
        $kodeKeNama = [
            'TD'   => 'S1 Teknik Dirgantara',
            'TM'   => 'S1 Teknik Mesin',
            'AERO' => 'D3 Aeronautika',
            'TI'   => 'S1 Teknik Industri',
            'IF'   => 'S1 Informatika',
            'TE'   => 'S1 Teknik Elektro',
            'MNJ'  => 'S1 Manajemen',
            'HKM'  => 'S1 Hukum',
            'FAR'  => 'D3 Farmasi',
            'GIZ'  => 'D3 Gizi',
            'RAD'  => 'D3 Radiologi',
        ];

        // Ambil semua jurusan, buat lookup nama -> id
        $jurusanIdMap = JurusanKuliah::pluck('id', 'nama_jurusan')->toArray();

        $csvPath = database_path('data/mapping_soal.csv');

        if (!file_exists($csvPath)) {
            $this->command->error("File CSV tidak ditemukan di: $csvPath");
            return;
        }

        $handle = fopen($csvPath, 'r');
        $header = fgetcsv($handle); // lewati baris header

        $pertanyaanCache = []; // nomor_soal => id pertanyaan

        while (($row = fgetcsv($handle)) !== false) {
            [$nomorSoal, $opsi, $kodeJurusan] = $row;
            $nomorSoal = (int) $nomorSoal;
            $opsi = trim($opsi);
            $kodeJurusan = trim($kodeJurusan);

            // Buat pertanyaan kalau belum ada di cache
            if (!isset($pertanyaanCache[$nomorSoal])) {
                $pertanyaan = Pertanyaan::updateOrCreate(
                    ['nomor_urut' => $nomorSoal],
                    [
                        'nomor_urut' => $nomorSoal,
                        'teks_pertanyaan' => 'Yuk, Cari Tahu Apa yang Paling Cocok Untukmu!',
                    ]
                );
                $pertanyaanCache[$nomorSoal] = $pertanyaan->id;
            }

            $namaJurusan = $kodeKeNama[$kodeJurusan] ?? null;

            if (!$namaJurusan || !isset($jurusanIdMap[$namaJurusan])) {
                $this->command->warn("Kode jurusan '$kodeJurusan' tidak dikenali (soal $nomorSoal opsi $opsi)");
                continue;
            }

            $jurusanId = $jurusanIdMap[$namaJurusan];
            $gambarPath = "soal/{$nomorSoal}/{$nomorSoal}{$opsi}.jpe";

            OpsiJawaban::updateOrCreate(
                [
                    'pertanyaan_id' => $pertanyaanCache[$nomorSoal],
                    'label' => $opsi,
                ],
                [
                    'gambar_opsi' => $gambarPath,
                    'jurusan_kuliah_id' => $jurusanId,
                ]
            );
        }

        fclose($handle);

        $this->command->info('Berhasil import 50 soal + 200 opsi jawaban.');
    }
}