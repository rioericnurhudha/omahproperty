<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use App\Models\UangKeluar;
use App\Models\UangMasuk;

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
        // dd($request);
        DaftarPelanggan::create($request->all());
        return redirect()->route('daftarpelanggan')->with('success', 'data berhasil ditambahkan!');
    }

    public function daftarpelanggantampil($id){
        $data = DaftarPelanggan::find($id);
        return view('daftarpelanggantampil', compact('data'));
    }

    public function daftarpelangganupdate(Request $request, $id){
        $data = DaftarPelanggan::find($id);
        $data->update($request->all());
        return redirect()->route('daftarpelanggan')->with('success', 'Data berhasil diperbarui!');
    }

    public function daftarpelanggandelete($id){
        $data = DaftarPelanggan::find($id);
        $data->delete();
        return redirect()->route('daftarpelanggan')->with('success', 'Data berhasil dihapus!');
    }
}
