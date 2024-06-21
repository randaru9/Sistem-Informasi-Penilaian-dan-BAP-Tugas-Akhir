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
        Schema::create('jenis_seminar', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->id('id');
            $table->string('keterangan')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('seminar', function (Blueprint $table) {
            $table->foreignId('jenis_seminar_id')->constrained('jenis_seminar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_seminar');
    }
};
