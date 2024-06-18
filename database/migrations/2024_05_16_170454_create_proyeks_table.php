<?php

use App\Models\DaftarPelanggan;
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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_pelanggan")->nullable(false);
            $table->string('type_proyek', 50)->nullable();
            $table->string('lokasi_proyek')->nullable();
            $table->string('gambar_proyek')->nullable();
            $table->bigInteger('harga_proyek')->nullable();
            $table->string('status_proyek')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('daftar_pelanggan')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
