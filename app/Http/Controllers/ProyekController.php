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
    public function jumlahProyek()
    {
        $proyek = Proyek::count();
        return view('welcome', compact('proyek'));
    }
    public function proyek($id)
    {
        $data = Proyek::with('daftarpelanggan')->where('id_pelanggan', '=', $id)->get();

        $nama_pelanggan = DaftarPelanggan::where('id', '=', $id)->pluck('nama_pelanggan')->first();
        $id_pelanggan = DaftarPelanggan::where('id', '=', $id)->pluck('id')->first();

        return view('proyek', compact('data', 'nama_pelanggan', 'id_pelanggan'));
    }

    public function getdaftarpelangganId($id)
    {
        $daftarpelanggan = DaftarPelanggan::find($id);
        if ($daftarpelanggan) {
            return "ID pengguna adalah: $daftarpelanggan->id";
        } else {
            return "Pengguna tidak ditemukan";
        }
    }

    public function proyektambah($id_pelanggan)
    {
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

    public function proyektampil($id)
    {
        $data = Proyek::find($id);
        return view('proyektampil', compact('data'));
    }

    public function proyekdetail(Request $request, $id)
    {
        $data = Proyek::find($id);
        return view('proyekdetail', compact('data'));
    }

    public function proyekupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type_proyek'   => 'required',
            'lokasi_proyek' => 'required',
            'gambar_proyek' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'harga_proyek'  => 'required|numeric',
            'id_pelanggan'  => 'required',
            'keterangan'    => 'required',
        ]);

        $proyek = Proyek::find($id);

        // Handle image upload if a new image is provided
        if ($request->hasFile('gambar_proyek')) {
            // Delete old image if exists
            $this->deleteProyekImage($proyek);

            // Upload new image
            $imageName = time() . '.' . $request->file('gambar_proyek')->getClientOriginalExtension();
            $request->file('gambar_proyek')->move(public_path('images'), $imageName);
            $proyek->gambar_proyek = $imageName;
        }

        // Update project with validated data
        $proyek->type_proyek = $validatedData['type_proyek'];
        $proyek->lokasi_proyek = $validatedData['lokasi_proyek'];
        $proyek->harga_proyek = $validatedData['harga_proyek'];
        $proyek->keterangan = $validatedData['keterangan'];
        $proyek->id_pelanggan = $validatedData['id_pelanggan'];
        $proyek->save();

        // Update project status based on total payments
        $this->updateProyekStatus($id);

        return redirect()->route('proyek', ['id' => $proyek->id_pelanggan])->with('success', 'Data berhasil diperbarui!');
    }

    public function proyekdelete($id)
    {
        $data = Proyek::find($id);
        $id_pelanggan = $data->id_pelanggan; // Simpan ID pelanggan sebelum proyek dihapus

        // Hapus gambar proyek jika ada
        if ($data->gambar_proyek) {
            $imagePath = public_path('images') . '/' . $data->gambar_proyek;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $data->delete();
        return redirect()->route('proyek', ['id' => $id_pelanggan])->with('success', 'Data berhasil dihapus!');
    }
    private function deleteProyekImage($data)
    {
        if ($data->gambar_proyek) {
            $imagePath = public_path('images') . '/' . $data->gambar_proyek;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}
