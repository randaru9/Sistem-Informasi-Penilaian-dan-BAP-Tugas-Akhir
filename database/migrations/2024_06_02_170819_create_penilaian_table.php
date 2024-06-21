<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pengguna_id')->constrained('pengguna');
            $table->foreignId('status_penilaian_id')->constrained('status_penilaian');
            $table->tinyInteger('penulisan_draft_tugas_akhir_dan_ppt')->nullable();
            $table->tinyInteger('penyajian_atau_presentasi')->nullable();
            $table->tinyInteger('penguasaan_materi')->nullable();
            $table->tinyInteger('kemampuan_menjawab')->nullable();
            $table->tinyInteger('etika_dan_sopan_santun')->nullable();
            $table->tinyInteger('nilai_bimbingan')->nullable();
            $table->string('ttd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
