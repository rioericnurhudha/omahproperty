<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DaftarPelanggan extends Model
{
    use HasFactory;


    protected $table= "daftar_pelanggan";

    public $timestamps=true;

    protected $primaryKey= "id";

    protected $keyType="int";

    public $incrementing=true;

    protected $fillable = ['nama_pelanggan','no_hp','alamat'];

    public function proyek()
    {
        // daftar pelanggan mempunyai banyak data di tabel proyek
        return $this->hasMany(Proyek::class);
    }
}
