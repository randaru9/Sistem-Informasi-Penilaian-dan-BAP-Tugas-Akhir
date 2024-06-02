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
        Schema::create('yudisium', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pengguna_id')->constrained('pengguna');
            $table->foreignUuid('status_yudisium_id')->constrained('status_yudisium');
            $table->foreignUuid('periode_wisuda_id')->constrained('periode_wisuda');
            $table->string('tempat_dan_bidang_kerja');
            $table->string('saran_dan_kritik');
            $table->string('berkas');
            $table->string('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yudisium');
    }
};