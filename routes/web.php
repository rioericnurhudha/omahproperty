<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\DaftarPelangganController;
use App\Http\Controllers\UangMasukController;
use App\Http\Controllers\UangKeluarController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KantorKeluarController;
use App\Http\Controllers\LaporanPelangganController;
use App\Http\Controllers\KegiatanTransaksiController;
use App\Http\Controllers\LaporanKantorController;

use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerProccess', [LoginController::class, 'registerProccess'])->name('registerProccess');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Middleware admin digunakan pada route berikut
Route::middleware(['admin'])->group(function () {
  
// untuk menampilkan tabel admin
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/admintambah', [AdminController::class, 'admintambah'])->name('admintambah');
Route::post('/insertadmin', [AdminController::class, 'insertadmin'])->name('insertadmin');
Route::get('/admintampil/{id}', [AdminController::class, 'admintampil'])->name('admintampil');
Route::post('/adminupdate/{id}', [AdminController::class, 'adminupdate'])->name('adminupdate');
Route::get('/adminhapus/{id}', [AdminController::class, 'adminhapus'])->name('adminhapus');

Route::get('/direktur', [DirekturController::class, 'direktur'])->name('direktur');
Route::get('/direkturtambah', [DirekturController::class, 'direkturtambah'])->name('direkturtambah');
Route::post('/direkturinsert', [DirekturController::class, 'direkturinsert'])->name('direkturinsert');
Route::get('/direkturtampil/{id}', [DirekturController::class, 'direkturtampil'])->name('direkturtampil');
Route::post('/direkturupdate/{id}', [DirekturController::class, 'direkturupdate'])->name('direkturupdate');
Route::get('/direkturdelete/{id}', [DirekturController::class, 'direkturdelete'])->name('direkturdelete');


Route::get('/dashboard', [DaftarPelangganController::class, 'jumlahPelanggan'])->name('dashboard');

Route::get('/daftarpelanggan', [DaftarPelangganController::class, 'daftarpelanggan'])->name('daftarpelanggan');
Route::get('/daftarpelanggantambah', [DaftarPelangganController::class, 'daftarpelanggantambah'])->name('daftarpelanggantambah');
Route::post('/daftarpelangganinsert', [DaftarPelangganController::class, 'daftarpelangganinsert'])->name('daftarpelangganinsert');
Route::get('/daftarpelanggantampil/{id}', [DaftarPelangganController::class, 'daftarpelanggantampil'])->name('daftarpelanggantampil');
Route::post('/daftarpelangganupdate/{id}', [DaftarPelangganController::class, 'daftarpelangganupdate'])->name('daftarpelangganupdate');
Route::get('/daftarpelanggandelete/{id}', [DaftarPelangganController::class, 'daftarpelanggandelete'])->name('daftarpelanggandelete');

Route::get('/uangmasuk/{id}', [UangMasukController::class, 'uangmasuk'])->name('uangmasuk');
Route::get('/searchuangmasuk/{id}', [UangMasukController::class, 'searchuangmasuk'])->name('searchuangmasuk');
Route::get('/uangmasuktambah/{id_pelanggan}', [UangMasukController::class, 'uangmasuktambah'])->name('uangmasuktambah');
Route::post('/uangmasukinsert', [UangMasukController::class, 'uangmasukinsert'])->name('uangmasukinsert');

Route::get('/uangmasuktampil/{id}', [UangMasukController::class, 'uangmasuktampil'])->name('uangmasuktampil');
Route::post('/uangmasukupdate/{id}', [UangMasukController::class, 'uangmasukupdate'])->name('uangmasukupdate');
Route::get('/uangmasukdelete/{id}', [UangMasukController::class, 'uangmasukdelete'])->name('uangmasukdelete');

// ROUTE UANG KELUAR
Route::get('/uangkeluar/{id_proyek}', [UangKeluarController::class, 'uangkeluar'])->name('uangkeluar');
Route::get('/uangkeluartambah/{id_uang_masuk}', [UangKeluarController::class, 'uangkeluartambah'])->name('uangkeluartambah');
Route::post('/uangkeluarinsert', [UangKeluarController::class, 'uangkeluarinsert'])->name('uangkeluarinsert');
Route::get('/uangkeluartampil/{id}', [UangKeluarController::class, 'uangkeluartampil'])->name('uangkeluartampil');
Route::post('/uangkeluarupdate/{id}', [UangKeluarController::class, 'uangkeluarupdate'])->name('uangkeluarupdate');
Route::get('/uangkeluardelete/{id}', [UangKeluarController::class, 'uangkeluardelete'])->name('uangkeluardelete');

// ROUTE PROYEK
Route::get('/proyek/{id}', [ProyekController::class, 'proyek'])->name('proyek');
Route::get('/proyektambah/{id_pelanggan}', [ProyekController::class, 'proyektambah'])->name('proyektambah');
Route::post('/proyekinsert', [ProyekController::class, 'proyekinsert'])->name('proyekinsert');
Route::get('/proyektampil/{id}', [ProyekController::class, 'proyektampil'])->name('proyektampil');
Route::post('/proyekupdate/{id}', [ProyekController::class, 'proyekupdate'])->name('proyekupdate');
Route::get('/proyekdelete/{id}', [ProyekController::class, 'proyekdelete'])->name('proyekdelete');
Route::get('/proyekdetail/{id}', [ProyekController::class, 'proyekdetail'])->name('proyekdetail');

// ROUTE KAS
Route::get('/kas', [KasController::class, 'kas'])->name('kas');
Route::get('/kastambah', [KasController::class, 'kastambah'])->name('kastambah');
Route::post('/kasinsert', [KasController::class, 'kasinsert'])->name('kasinsert');
Route::get('/kastampil/{id}', [KasController::class, 'kastampil'])->name('kastampil');
Route::post('/kasupdate/{id}', [KasController::class, 'kasupdate'])->name('kasupdate');
Route::get('/kasdelete/{id}', [KasController::class, 'kasdelete'])->name('kasdelete');

// ROUTE KANTOR KELUAR
Route::get('/kantorkeluar', [KantorKeluarController::class, 'kantorkeluar'])->name('kantorkeluar');
Route::get('/kantorkeluartambah', [KantorKeluarController::class, 'kantorkeluartambah'])->name('kantorkeluartambah');
Route::post('/kantorkeluarinsert', [KantorKeluarController::class, 'kantorkeluarinsert'])->name('kantorkeluarinsert');
Route::get('/kantorkeluartampil/{id}', [KantorKeluarController::class, 'kantorkeluartampil'])->name('kantorkeluartampil');
Route::post('/kantorkeluarupdate/{id}', [KantorKeluarController::class, 'kantorkeluarupdate'])->name('kantorkeluarupdate');
Route::get('/kantorkeluardelete/{id}', [KantorKeluarController::class, 'kantorkeluardelete'])->name('kantorkeluardelete');

// ROUTE LAPORAN PELANGGAN
Route::get('/laporanpelanggan', [LaporanPelangganController::class, 'laporanpelanggan'])->name('laporanpelanggan');
Route::get('/searchlaporanpelanggan', [LaporanPelangganController::class, 'searchLaporanPelanggan'])->name('searchLaporanPelanggan');
Route::get('/laporanpelanggan/export', [LaporanPelangganController::class, 'exportExcel'])->name('laporanpelanggan.export');


Route::get('/kegiatantransaksi', [KegiatanTransaksiController::class, 'kegiatantransaksi'])->name('kegiatantransaksi');

// ROUTE LAPORAN KANTOR
Route::get('/laporankantor', [LaporanKantorController::class, 'laporankantor'])->name('laporankantor');
});
