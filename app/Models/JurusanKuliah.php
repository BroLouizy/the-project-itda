<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jurusan',
        'deskripsi',
    ];

    public function opsiJawabans()
    {
        return $this->hasMany(OpsiJawaban::class);
    }

    public function tesResults()
    {
        return $this->hasMany(TesResult::class, 'jurusan_rekomendasi_id');
    }
}