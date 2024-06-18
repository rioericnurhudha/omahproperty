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
        Schema::create('kegiatan_transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('hari_tanggal');
            $table->string('keperluan');
            $table->bigInteger('jumlah_barang');
            $table->bigInteger('harga_barang');
            $table->bigInteger('total_harga');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_transaksi');
    }
};
