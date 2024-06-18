<?php

namespace App\Http\Controllers;
use App\Models\UangKeluar;
use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UangKeluarController extends Controller
{
    public function uangkeluar($id_proyek){
        $data = UangKeluar::with('foreignUangMasuk')->where('id_proyek','=',$id_proyek)->get();


        $total_uang_keluar = UangKeluar::where('id_proyek', '=', $id_proyek)
        ->sum('total_harga');

        $total_uang_masuk = UangMasuk::where('id_proyek', '=', $id_proyek)
        ->sum('jumlah_pembayaran');

        $sisa_uang = $total_uang_masuk - $total_uang_keluar;

        $id_proyek = UangMasuk::where('id_proyek','=',$id_proyek)->pluck('id_proyek')->first();

        return view('uangkeluar', compact('data','total_uang_keluar','id_proyek','total_uang_masuk','sisa_uang'));
    }

    public function uangkeluartambah($id_proyek){
        $id_proyek = UangMasuk::where('id_proyek','=',$id_proyek)->pluck('id_proyek')->first();
        return view ('uangkeluartambah',compact('id_proyek'));
    }

    public function uangkeluarinsert(Request $request){
        $validate = $request->validate([
            'hari_tanggal'   => 'required',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga'  => 'required',
            'id_proyek'  => 'required',
            'keterangan'    => 'required',
        ]);
    
        $validate['total_harga'] = $request->jumlah_barang*$request->harga;
        UangKeluar::create($validate);
        return redirect()->route('uangkeluar', ['id_proyek' => $request->id_proyek])->with('success', 'Data berhasil ditambahkan!');
    }

    public function uangkeluartampil($id){
        $data = UangKeluar::find($id);
        return view ('uangkeluartampil', compact('data'));
    }

    public function uangkeluarupdate(Request $request, $id){
        $validate = $request->validate([
            'hari_tanggal'   => 'required',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga'  => 'required',
            'id_proyek'  => 'required',
            'keterangan'    => 'required',
        ]);
    
        $validate['total_harga'] = $request->jumlah_barang*$request->harga;
        $data = UangKeluar::find($id);
        $data->update($validate);
        return redirect()->route('uangkeluar', ['id' => $data->id_proyek])->with('success', 'Data berhasil diupdate!');
    }

    public function uangkeluardelete($id){
        $data = UangKeluar::find($id);
        $data->delete();
        return redirect()->route('uangkeluar', ['id_proyek' => $data->id_proyek])->with('success', 'Data berhasil dihapus!');
    }
}
