<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangKeluar extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table= "uang_keluar";

    // memberi nilai kosong atau isi pada tabel created_at dan update_at
    public $timestamps=true;

    protected $primaryKey= "id";

    protected $keyType="int";

    // apakah id akan bertambah atau tidak jika tidak maka diisi false
    public $incrementing=true;

    // untuk menentukan kolom-kolom mana yang dapat diisi secara massal (mass assignable) ketika membuat atau memperbarui sebuah record dalam basis data.
    protected $fillable = ['id_proyek','hari_tanggal', 'nama_barang', 'jumlah_barang', 'harga', 'total_harga', 'keterangan'];
    public function foreignUangMasuk()
    {
        // statement, belongto untuk menyambung ke tabel daftar pelanggan, dimana id_pelanggan di tabel uang masuk menyambung dengan id di tabel daftar pelanggan
        return $this->belongsTo(UangMasuk::class,'id_proyek', 'id_proyek');
    }
    public function foreignProyek()
    {
        // statement, belongto untuk menyambung ke tabel daftar pelanggan, dimana id_pelanggan di tabel uang masuk menyambung dengan id di tabel daftar pelanggan
        return $this->belongsTo(Proyek::class,'id_proyek', 'id');
    }
}
