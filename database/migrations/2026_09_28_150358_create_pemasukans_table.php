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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id('id_pemasukan');
            $table->foreignId('nis')->constrained('siswa', 'nis')->cascadeOnDelete();
            $table->foreignId('id_periode')->constrained('periode', 'id_periode')->cascadeOnDelete();
            $table->foreignId('id_user')->constrained('users', 'id_user')->cascadeOnDelete();
            $table->decimal('nominal_infaq_masjid', 12, 2)->default(0);
            $table->decimal('nominal_pagi_berbagi', 12, 2)->default(0);
            $table->boolean('status_bayar')->default(false);
            $table->dateTime('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
