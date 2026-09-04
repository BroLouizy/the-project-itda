<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opsi_jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanyaan_id')->constrained()->onDelete('cascade');
            $table->string('label', 1); // A, B, C, atau D
            $table->string('gambar_opsi'); // path gambar jawaban
            $table->foreignId('jurusan_kuliah_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opsi_jawabans');
    }
};