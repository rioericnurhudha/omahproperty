<?php

namespace App\Http\Controllers;
use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use RealRashid\SweetAlert\Facades\Alert;

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

    public function getdaftarpelangganId($id){
        $daftarpelanggan = DaftarPelanggan::find($id);
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

    
    public function proyekinsert(Request $request)
    {
        $validate = $request->validate([
            'type_proyek'   => 'required',
            'lokasi_proyek' => 'required',
            'gambar_proyek' => 'required|mimes:png,jpg,jpeg|max:2048',
            'harga_proyek'  => 'required',
            'id_pelanggan'  => 'required',
            'keterangan'    => 'required',
        ]);
    
        $proyek = Proyek::create($validate);
    
        // Calculate total payments for the project
        $totalUangMasuk = UangMasuk::where('id_proyek', $proyek->id)->sum('jumlah_pembayaran');
    
        // Determine project status based on payments
        if ($totalUangMasuk >= $proyek->harga_proyek) {
            $proyek->status_proyek = 'lunas';
        } else {
            $proyek->status_proyek = 'belum lunas';
        }
    
        // Upload and save project image if exists
        if ($request->hasFile('gambar_proyek')) {
            $imageName = time() . '.' . $request->file('gambar_proyek')->extension();
            $request->file('gambar_proyek')->move(public_path('images'), $imageName);
            $proyek->gambar_proyek = $imageName;
            $proyek->save();
        }
    
        // Show success alert and redirect with success message
    
        return redirect()->route('proyek', ['id' => $proyek->id_pelanggan])->with('success', 'Data berhasil ditambahkan!');
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
        $validate = $request->validate([
            'type_proyek'   => 'required',
            'lokasi_proyek' => 'required',
            'gambar_proyek' => 'required|mimes:png,jpg,jpeg|max:2048',
            'harga_proyek'  => 'required',
            'id_pelanggan'  => 'required',
            'keterangan'    => 'required',
        ]);
        $data = Proyek::find($id);
        $data->update($validate);

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
