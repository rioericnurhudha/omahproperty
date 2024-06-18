<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// untuk merubah sesuatu menggunakan post
// untuk mengambil sesuatu menggunakan get

Route::get('/', function (){
    return view('welcome');
});

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerProccess', [LoginController::class, 'registerProccess'])->name('registerProccess');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::post('/make', [ProyekController::class, 'make'])->name('make');


// ROUTE ADMIN
// untuk menampilkan tabel admin
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');


// untuk menampilkan menu form tambah admin
Route::get('/admintambah', [AdminController::class, 'admintambah'])->name('admintambah');
Route::post('/insertadmin', [AdminController::class, 'insertadmin'])->name('insertadmin');

// untuk menampilkan edit dan hasil dari form tambah
Route::get('/admintampil/{id}', [AdminController::class, 'admintampil'])->name('admintampil');
// merubah sesuatu ganti post
Route::post('/adminupdate/{id}', [AdminController::class, 'adminupdate'])->name('adminupdate');

// untuk menaampilkan hapus data admin
Route::get('/adminhapus/{id}', [AdminController::class, 'adminhapus'])->name('adminhapus');

// ROUTE DIREKTUR
Route::get('/direktur', [DirekturController::class, 'direktur'])->name('direktur');

Route::get('/direkturtambah', [DirekturController::class, 'direkturtambah'])->name('direkturtambah');
Route::post('/direkturinsert', [DirekturController::class, 'direkturinsert'])->name('direkturinsert');

Route::get('/direkturtampil/{id}', [DirekturController::class, 'direkturtampil'])->name('direkturtampil');

Route::post('/direkturupdate/{id}', [DirekturController::class, 'direkturupdate'])->name('direkturupdate');

Route::get('/direkturdelete/{id}', [DirekturController::class, 'direkturdelete'])->name('direkturdelete');



// ROUTE DAFTAR PELANGGAN
Route::get('/daftarpelanggan', [DaftarPelangganController::class, 'daftarpelanggan'])->name('daftarpelanggan');
Route::get('/', [DaftarPelangganController::class, 'jumlahPelanggan'])->name('jumlahPelanggan');

Route::get('/daftarpelanggantambah', [DaftarPelangganController::class, 'daftarpelanggantambah'])->name('daftarpelanggantambah');
Route::post('/daftarpelangganinsert', [DaftarPelangganController::class, 'daftarpelangganinsert'])->name('daftarpelangganinsert');

Route::get('/daftarpelanggantampil/{id}', [DaftarPelangganController::class, 'daftarpelanggantampil'])->name('daftarpelanggantampil');
Route::post('/daftarpelangganupdate/{id}', [DaftarPelangganController::class, 'daftarpelangganupdate'])->name('daftarpelangganupdate');

Route::get('/daftarpelanggandelete/{id}', [DaftarPelangganController::class, 'daftarpelanggandelete'])->name('daftarpelanggandelete');


// ROUTE UANG MASUK
// menampilkan tabel uang masuk {id} didapat dari id daftar pelanggan
Route::get('/uangmasuk/{id}', [UangMasukController::class, 'uangmasuk'])->name('uangmasuk');

// untung searching
Route::get('/searchuangmasuk/{id}', [UangMasukController::class, 'searchuangmasuk'])->name('searchuangmasuk');

Route::get('/uangmasuktambah/{id_pelanggan}', [UangMasukController::class, 'uangmasuktambah'])->name('uangmasuktambah');
Route::post('/uangmasukinsert', [UangMasukController::class, 'uangmasukinsert'])->name('uangmasukinsert');

Route::get('/uangmasuktampil/{id}', [UangMasukController::class, 'uangmasuktampil'])->name('uangmasuktampil');
Route::post('/uangmasukupdate/{id}', [UangMasukController::class, 'uangmasukupdate'])->name('uangmasukupdate');

Route::get('/uangmasukdelete/{id}', [UangMasukController::class, 'uangmasukdelete'])->name('uangmasukdelete');

// ROUTE UANG KELUAR
// menampilkan tabel uang keluar
Route::get('/uangkeluar/{id_proyek}', [UangKeluarController::class, 'uangkeluar'])->name('uangkeluar');

// menampilkan menu form tambah uang keluar
Route::get('/uangkeluartambah/{id_uang_masuk}', [UangKeluarController::class, 'uangkeluartambah'])->name('uangkeluartambah');
Route::post('/uangkeluarinsert', [UangKeluarController::class, 'uangkeluarinsert'])->name('uangkeluarinsert');

// menampilkan aksi edit uang keluar
Route::get('/uangkeluartampil/{id}', [UangKeluarController::class, 'uangkeluartampil'])->name('uangkeluartampil');
Route::post('/uangkeluarupdate/{id}', [UangKeluarController::class, 'uangkeluarupdate'])->name('uangkeluarupdate');

// menampilkan aksi delete
Route::get('/uangkeluardelete/{id}', [UangKeluarController::class, 'uangkeluardelete'])->name('uangkeluardelete');

// ROUTE PROYEK
// menampilkan tabel proyek
Route::get('/proyek/{id}', [ProyekController::class, 'proyek'])->name('proyek');

// menampilkan form tambah proyek
Route::get('/proyektambah/{id_pelanggan}', [ProyekController::class, 'proyektambah'])->name('proyektambah');
Route::post('/proyekinsert', [ProyekController::class, 'proyekinsert'])->name('proyekinsert');

// menampilkan aksi edit proyek
Route::get('/proyektampil/{id}', [ProyekController::class, 'proyektampil'])->name('proyektampil');
Route::post('/proyekupdate/{id}', [ProyekController::class, 'proyekupdate'])->name('proyekupdate');

// menampilkan aksi delete
Route::get('/proyekdelete/{id}', [ProyekController::class, 'proyekdelete'])->name('proyekdelete');


Route::get('/proyekdetail/{id}', [ProyekController::class, 'proyekdetail'])->name('proyekdetail');

// ROUTE KAS
// menampilkan tabel kas
Route::get('/kas', [KasController::class, 'kas'])->name('kas');

// form tambah kas
Route::get('/kastambah', [KasController::class, 'kastambah'])->name('kastambah');
Route::post('/kasinsert', [KasController::class, 'kasinsert'])->name('kasinsert');

// menampilkan aksi edit kas
Route::get('/kastampil/{id}', [KasController::class, 'kastampil'])->name('kastampil');
Route::post('/kasupdate/{id}', [KasController::class, 'kasupdate'])->name('kasupdate');

// menampilkan aksi delete
Route::get('/kasdelete/{id}', [KasController::class, 'kasdelete'])->name('kasdelete');

// ROUTE KANTOR KELUAR
Route::get('/kantorkeluar', [KantorKeluarController::class, 'kantorkeluar'])->name('kantorkeluar');

// form tambah kantor keluar
Route::get('/kantorkeluartambah', [KantorKeluarController::class, 'kantorkeluartambah'])->name('kantorkeluartambah');
Route::post('/kantorkeluarinsert', [KantorKeluarController::class, 'kantorkeluarinsert'])->name('kantorkeluarinsert');

// aksi edit kas
Route::get('/kantorkeluartampil/{id}', [KantorKeluarController::class, 'kantorkeluartampil'])->name('kantorkeluartampil');
Route::post('/kantorkeluarupdate/{id}', [KantorKeluarController::class, 'kantorkeluarupdate'])->name('kantorkeluarupdate');

// aksi delete
Route::get('/kantorkeluardelete/{id}', [KantorKeluarController::class, 'kantorkeluardelete'])->name('kantorkeluardelete');


// ROUTE LAPORAN PELANGGAN
Route::get('/laporanpelanggan', [LaporanPelangganController::class, 'laporanpelanggan'])->name('laporanpelanggan');
Route::get('/laporanpelanggan', [LaporanPelangganController::class, 'searchLaporanPelanggan'])->name('searchLaporanPelanggan');
Route::get('/laporanpelanggan/export', [LaporanPelangganController::class, 'exportExcel'])->name('laporanpelanggan.export');

// ROUTE KEGIATAN TRANSAKSI
Route::get('/kegiatantransaksi', [KegiatanTransaksiController::class, 'kegiatantransaksi'])->name('kegiatantransaksi');


// ROUTE LAPORAN KANTOR
Route::get('/laporankantor', [LaporanKantorController::class, 'laporankantor'])->name('laporankantor');
