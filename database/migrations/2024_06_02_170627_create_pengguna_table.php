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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('role_id')->constrained('role');
            $table->boolean('is_koordinator')->default(false);
            $table->string('nama')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('nim')->unique()->nullable();
            $table->string('nip')->unique()->nullable();
            $table->string('ttd')->nullable();
            $table->string('password');
            $table->string('otp')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
