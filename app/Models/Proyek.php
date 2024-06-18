<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $table= "proyek";

    // memberi nilai kosong atau isi pada tabel created_at dan update_at
    public $timestamps=true;

    protected $primaryKey= "id";

    protected $keyType="int";

    // apakah id akan bertambah atau tidak jika tidak maka diisi false
    public $incrementing=true;

    // untuk menentukan kolom-kolom mana yang dapat diisi secara massal (mass assignable) ketika membuat atau memperbarui sebuah record dalam basis data.
    protected $fillable = ['id_pelanggan','nama_proyek','type_proyek','lokasi_proyek','gambar_proyek', 'harga_proyek', 'status_proyek', 'keterangan'];

    public function daftarpelanggan()
    {
        // statement, belongto untuk menyambung ke tabel daftar pelanggan, dimana id_pelanggan di tabel uang masuk menyambung dengan id di tabel daftar pelanggan
        return $this->belongsTo(DaftarPelanggan::class,'id_pelanggan', 'id');
    }
    public function uangmasuk()
    {
        return $this->hasMany(UangMasuk::class, 'id_proyek', 'id');
    }

    public function uangkeluar()
    {
        return $this->hasMany(UangKeluar::class, 'id_proyek', 'id');
    }
    
}
