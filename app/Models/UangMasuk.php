<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UangMasuk extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    protected $table= "uang_masuk";
    public $timestamps=true;

    protected $primaryKey= "id";
    protected $foreignKey= "id_proyek";

    protected $keyType="int";

    public $incrementing=true;

    protected $fillable = ['hari_tanggal','id_proyek', 'jenis_pembayaran', 'jumlah_pembayaran'];

    public function proyek()
    {
        // statement, belongto untuk menyambung ke tabel daftar pelanggan, dimana id_pelanggan di tabel uang masuk menyambung dengan id di tabel daftar pelanggan
        return $this->belongsTo(Proyek::class,'id_proyek', 'id');
    }
    public function uangKeluar()
    {
        return $this->hasMany(UangKeluar::class);
    }
}
