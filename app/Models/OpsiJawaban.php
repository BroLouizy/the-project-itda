<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiJawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan_id',
        'label',
        'gambar_opsi',
        'jurusan_kuliah_id',
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function jurusanKuliah()
    {
        return $this->belongsTo(JurusanKuliah::class);
    }
}