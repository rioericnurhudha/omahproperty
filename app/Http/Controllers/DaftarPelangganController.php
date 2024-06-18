<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use App\Models\UangKeluar;
use App\Models\UangMasuk;
use RealRashid\SweetAlert\Facades\Alert; // Import facade SweetAlert

class DaftarPelangganController extends Controller
{

    public function jumlahPelanggan(){
        $pelanggan = DaftarPelanggan::count();
        $proyek = Proyek::count();

        $total_uang_masuk = UangMasuk::sum('jumlah_pembayaran');
        $total_uang_keluar = UangKeluar::sum('total_harga');

        $sisa_uang = format_rupiah($total_uang_masuk - $total_uang_keluar);

        return view('welcome',compact('pelanggan','proyek','sisa_uang'));
    }
    public function daftarpelanggan(Request $request){
        $data = new DaftarPelanggan();

        if($request->get('search')){
            $data = $data->where('nama_pelanggan', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('alamat', 'LIKE', '%'.$request->get('search').'%');
        }
        $data = $data->get();
        return view('daftarpelanggan', compact('data', 'request'));
    }

    public function DaftarPelanggantambah(){
        return view('daftarpelanggantambah');
    }
    public function daftarpelangganinsert(Request $request){
        $validate = $request->validate([
            'nama_pelanggan'   => 'required|unique:daftar_pelanggan,nama_pelanggan',
            'no_hp' => 'required',
            'alamat' => 'required',
            
        ]);
        if (DaftarPelanggan::where('nama_pelanggan', $validate['nama_pelanggan'])->count() == 1) {
            return redirect()->route('daftarpelanggantambah')->with('failed');
        }
        DaftarPelanggan::create($validate);

        return redirect()->route('daftarpelanggan')->with('success', 'data berhasil ditambahkan!');
    }

    public function daftarpelanggantampil($id){
        $data = DaftarPelanggan::find($id);
        return view('daftarpelanggantampil', compact('data'));
    }

   
    public function daftarpelangganupdate(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
    
        // Ambil data pelanggan berdasarkan ID
        $data = DaftarPelanggan::find($id);
    
        // Periksa apakah ada dua pelanggan dengan nama yang sama selain data yang sedang diperbarui
        $existingCount = DaftarPelanggan::where('nama_pelanggan', $validate['nama_pelanggan'])
                                        ->where('id', '!=', $id)
                                        ->count();
    
        if ($existingCount > 0) {
            // Tampilkan sweet alert untuk gagal karena nama pelanggan sudah ada
            Alert::error('Gagal', 'Data gagal diperbarui karena nama pelanggan sudah ada.');
            return redirect()->route('daftarpelanggantampil', ['id' => $data->id]);
        }
    
        // Update data pelanggan
        $data->update($validate);
    
        // Tampilkan sweet alert untuk sukses
        Alert::success('success', 'Data berhasil diperbarui!');
    
        // Redirect ke halaman daftar pelanggan
        return redirect()->route('daftarpelanggan');
    }
    
    public function daftarpelanggandelete($id){
        $data = DaftarPelanggan::find($id);
        $data->delete();
        return redirect()->route('daftarpelanggan')->with('success', 'Data berhasil dihapus!');
    }
}
