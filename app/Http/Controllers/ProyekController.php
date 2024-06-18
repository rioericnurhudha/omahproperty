<?php

namespace App\Http\Controllers;
use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProyekController extends Controller
{
    public function jumlahProyek(){
        $proyek = Proyek::count();
        return view('welcome',compact('proyek'));
    }
    public function proyek($id){
        $data = Proyek::with('daftarpelanggan')->where('id_pelanggan', '=', $id)->get();

        $nama_pelanggan = DaftarPelanggan::where('id', '=', $id)->pluck('nama_pelanggan')->first();
        $id_pelanggan = DaftarPelanggan::where('id', '=', $id)->pluck('id')->first();

        return view('proyek', compact('data', 'nama_pelanggan', 'id_pelanggan'));
    }

    public function getdaftarpelangganId($Id){
        $daftarpelanggan = DaftarPelanggan::find($Id);
        if ($daftarpelanggan) {
            return "ID pengguna adalah: $daftarpelanggan->id";
        } else {
            return "Pengguna tidak ditemukan";
        }
    }

    public function proyektambah($id_pelanggan){
        $nama_pelanggan = DaftarPelanggan::where('id', '=', $id_pelanggan)->pluck('nama_pelanggan')->first();
        $data = DaftarPelanggan::all();
        return view('proyektambah', compact('data', 'nama_pelanggan', 'id_pelanggan'));
    }

    public function proyekinsert(Request $request){
        $validator = Validator::make($request->all(),[
            'type_proyek'   => 'required',
            'lokasi_proyek' => 'required',
            'gambar_proyek' => 'required|mimes:png,jpg,jpeg|max:2048',
            'harga_proyek'  => 'required',
            
            'keterangan'    => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $proyek = Proyek::create($request->all());
        $totalUangMasuk = UangMasuk::where('id_proyek', $request->id)->sum('jumlah_pembayaran');
        if ($totalUangMasuk >= $proyek->harga_proyek) {
            $proyek->status_proyek = 'lunas';
        } else {
            $proyek->status_proyek = 'belum lunas';
        }

        if ($request->hasFile('gambar_proyek')){
            $request->file('gambar_proyek')->move('images/', $request->file('gambar_proyek')->getClientOriginalName());
            $proyek->gambar_proyek = $request->file('gambar_proyek')->getClientOriginalName();
            $proyek->save();
        }

        return redirect()->route('proyek', ['id' => $proyek->id_pelanggan])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function proyektampil($id){
        $data = Proyek::find($id);
        return view('proyektampil', compact('data'));
    }

    public function proyekdetail(Request $request, $id){
        $data = Proyek::find($id);
        return view('proyekdetail', compact('data'));
    }

    public function proyekupdate(Request $request, $id){
        $data = Proyek::find($id);
        $data->update($request->all());

        // Hitung total uang masuk untuk proyek ini
        $totalUangMasuk = UangMasuk::where('id_proyek', $id)->sum('jumlah_pembayaran');

        // Update status proyek berdasarkan total uang masuk
        if ($totalUangMasuk >= $data->harga_proyek) {
            $data->status_proyek = 'lunas';
        } else {
            $data->status_proyek = 'belum lunas';
        }

        $data->save();

        return redirect()->route('proyek', ['id' => $data->id_pelanggan])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function proyekdelete($id){
        $data = Proyek::find($id);
        $id_pelanggan = $data->id_pelanggan; // Simpan ID pelanggan sebelum proyek dihapus
        $data->delete();
        return redirect()->route('proyek', ['id' => $id_pelanggan])->with('success', 'Data berhasil dihapus!');
    }
}
