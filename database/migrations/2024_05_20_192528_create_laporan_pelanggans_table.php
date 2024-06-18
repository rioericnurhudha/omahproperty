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
        Schema::create('laporan_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->date('hari_tanggal');
            $table->string('nama_pelanggan');
            $table->string('lokasi_proyek');
            $table->bigInteger('total_pembayaran');
            $table->bigInteger('angsuran');
            $table->bigInteger('sisa_angsuran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pelanggan');
    }
};
