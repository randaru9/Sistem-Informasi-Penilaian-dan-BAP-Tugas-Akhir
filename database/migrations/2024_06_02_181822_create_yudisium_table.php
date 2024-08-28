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
            $table->uuid('id');
            $table->foreignUuid('pengguna_id')->constrained('pengguna');
            $table->foreignId('status_yudisium_id')->constrained('status_yudisium');
            // $table->foreignId('periode_wisuda_id')->constrained('periode_wisuda');
            $table->date('periode_wisuda');
            $table->string('tempat_dan_bidang_kerja')->nullable();
            $table->string('saran_dan_kritik')->nullable();
            $table->string('berkas');
            $table->string('catatan')->nullable();
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
