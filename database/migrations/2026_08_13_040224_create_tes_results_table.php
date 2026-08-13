<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tes_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('jurusan_rekomendasi_id')->constrained('jurusan_kuliahs');
            $table->decimal('persentase', 5, 2);
            $table->json('detail_skor')->nullable();
            $table->timestamp('tanggal_tes')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tes_results');
    }
};