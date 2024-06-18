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
        Schema::create('kantor_keluar', function (Blueprint $table) {
            $table->id();
            $table->date('hari_tanggal');
            $table->string('nama_barang');
            $table->bigInteger('jumlah_barang');
            $table->bigInteger('harga');
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
        Schema::dropIfExists('kantor_keluar');
    }
};
