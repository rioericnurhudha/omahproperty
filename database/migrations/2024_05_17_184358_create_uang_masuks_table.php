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
        Schema::create('uang_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek')->nullable(false);
            $table->date('hari_tanggal');
            $table->string('jenis_pembayaran');
            $table->bigInteger('jumlah_pembayaran');
            $table->timestamps();

         
            $table->foreign('id_proyek')->references('id')->on('proyek')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uang_masuk');
    }
};
