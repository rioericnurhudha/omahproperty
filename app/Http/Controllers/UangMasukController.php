<?php

namespace App\Http\Controllers;

use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Models\UangMasuk;
use Illuminate\Support\Facades\DB;

class UangMasukController extends Controller
{
    public function uangMasuk($id){
        $data = UangMasuk::with('proyek')->where('id_proyek','=',$id)->get();
        $total_uang_masuk = UangMasuk::where('id_proyek', '=', $id)->sum('jumlah_pembayaran');
       
        $id_proyek = Proyek::where('id','=',$id)->pluck('id')->first();

        return view('uangmasuk', compact('data','id_proyek','total_uang_masuk'));
    }

    public function uangmasuktambah($id_proyek){
        $nama_pelanggan = DaftarPelanggan::where('id','=',$id_proyek)->pluck('nama_pelanggan')->first();
        $data=DaftarPelanggan::all();
        return view('uangmasuktambah', compact('data','nama_pelanggan','id_proyek'));
    }

    public function uangmasukinsert(Request $request){
        $this->validate($request, [
            'hari_tanggal'      => 'required',
            'jenis_pembayaran'  => 'required',
            'jumlah_pembayaran' => 'required'
        ]);

        $data = $request->all();
        UangMasuk::create($data);


        // Update status proyek setelah insert uang masuk
        $this->updateProyekStatus($request->id_proyek);

        return redirect()->route('uangmasuk', ['id' => $request->id_proyek])->with('success', 'Data berhasil ditambahkan!');
    }

    public function uangmasuktampil($id){
        $data = UangMasuk::find($id);
        return view('uangmasuktampil', compact('data'));
    }

    public function uangmasukupdate(Request $request, $id){
        $data = UangMasuk::find($id);
        $data->update($request->all());

        // Update status proyek setelah update uang masuk
        $this->updateProyekStatus($data->id_proyek);

        return redirect()->route('uangmasuk', ['id' => $data->id_proyek])->with('success', 'Data berhasil diperbarui!');
    }

    public function uangmasukdelete($id){
        $data = UangMasuk::find($id);
        $id_proyek = $data->id_proyek; // Simpan ID proyek sebelum dihapus
        $data->delete();

        // Update status proyek setelah delete uang masuk
        $this->updateProyekStatus($id_proyek);

        return redirect()->route('uangmasuk', ['id' => $id_proyek])->with('success', 'Data berhasil dihapus!');
    }

    private function updateProyekStatus($id_proyek) {
        $totalUangMasuk = UangMasuk::where('id_proyek', $id_proyek)->sum('jumlah_pembayaran');
        $proyek = Proyek::find($id_proyek);

        if ($totalUangMasuk >= $proyek->harga_proyek) {
            $proyek->status_proyek = 'lunas';
        } else {
            $proyek->status_proyek = 'belum lunas';
        }
        $proyek->save();
    }
}
