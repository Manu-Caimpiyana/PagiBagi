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
        Schema::create('siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('nis')->primary();
            $table->foreignId('id_rombel')->constrained('rombel', 'id_rombel')->cascadeOnDelete();
            $table->foreignId('id_rayon')->constrained('rayon', 'id_rayon')->cascadeOnDelete();
            $table->string('nama_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
