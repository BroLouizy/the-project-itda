<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jurusan_rekomendasi_id',
        'persentase',
        'detail_skor',
        'tanggal_tes',
    ];

    protected $casts = [
        'detail_skor' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jurusanRekomendasi()
    {
        return $this->belongsTo(JurusanKuliah::class, 'jurusan_rekomendasi_id');
    }
}