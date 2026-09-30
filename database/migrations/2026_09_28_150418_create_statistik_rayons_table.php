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
        Schema::create('statistik_rayon', function (Blueprint $table) {
            $table->id('id_statistik');
            $table->foreignId('id_rayon')->constrained('rayon', 'id_rayon')->cascadeOnDelete();
            $table->foreignId('id_periode')->constrained('periode', 'id_periode')->cascadeOnDelete();
            $table->decimal('total_nominal', 12, 2)->default(0);
            $table->unsignedBigInteger('jumlah_siswa_bayar')->default(0);
            $table->unsignedBigInteger('total_siswa')->default(0);
            $table->decimal('presentase_partisipasi', 5, 2)->default(0);
            $table->decimal('presentase_perubahan', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_rayon');
    }
};
