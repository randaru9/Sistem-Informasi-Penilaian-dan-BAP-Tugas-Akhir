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
        Schema::create('seminar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('bap1_id')->constrained('bap_1');
            $table->foreignUuid('bap2_id')->constrained('bap_2');
            $table->foreignUuid('pengguna_id')->constrained('pengguna');
            $table->foreignUuid('pembimbing_1_id')->constrained('pengguna');
            $table->foreignUuid('pembimbing_2_id')->constrained('pengguna');
            $table->foreignUuid('penguji_1_id')->constrained('pengguna');
            $table->foreignUuid('penguji_2_id')->constrained('pengguna');
            $table->foreignUuid('pimpinan_sidang_id')->constrained('pengguna');
            $table->string('judul');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('draft');
            $table->timestamps();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreignUuid('seminar_id')->constrained('seminar');
        });

        Schema::table('revisi', function (Blueprint $table) {
            $table->foreignUuid('seminar_id')->constrained('seminar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar');
    }
};
