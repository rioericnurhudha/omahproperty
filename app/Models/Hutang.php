<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table= "hutang";

    // memberi nilai kosong atau isi pada tabel created_at dan update_at
    public $timestamps=true;


    protected $keyType="int";

    // apakah id akan bertambah atau tidak jika tidak maka diisi false
    public $incrementing=true;

    // untuk menentukan kolom-kolom mana yang dapat diisi secara massal (mass assignable) ketika membuat atau memperbarui sebuah record dalam basis data.
    protected $fillable = ['hari_tanggal', 'nama_barang', 'jumlah_barang', 'harga', 'total_harga','nama_toko', 'keterangan'];
    }
