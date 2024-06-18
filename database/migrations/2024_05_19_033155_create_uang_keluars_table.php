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
        Schema::create('uang_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek')->nullable(false);
            $table->date('hari_tanggal');
            $table->string('nama_barang');
            $table->bigInteger('jumlah_barang');
            $table->bigInteger('harga');
            $table->bigInteger('total_harga');
            $table->string('keterangan');
            $table->timestamps();
            
            $table->foreign('id_proyek')->references('id_proyek')->on('uang_masuk')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uang_keluar');
    }
};
