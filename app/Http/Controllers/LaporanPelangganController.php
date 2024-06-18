<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPelangganExport;
use App\Models\DaftarPelanggan;
use App\Models\LaporanPelanggan;
use App\Models\Proyek;
use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPelangganController extends Controller
{
    public function laporanpelanggan()
    {
        // Fetch all customers
        $daftar_pelanggan = DaftarPelanggan::all();

        // Initialize an empty array for the report data
        $laporan = [];

        // Iterate through each customer
        foreach ($daftar_pelanggan as $pelanggan) {

            // Retrieve projects for the current customer
            $proyeks = Proyek::where('id_pelanggan', $pelanggan->id)->get();
            $harga_proyek = $proyeks->sum('harga_proyek');

            // Calculate total projects for the customer
            $total_proyek = $proyeks->count();

            // Initialize total amounts
            $total_uang_masuk = 0;
            $total_uang_keluar = 0;
            $sisa_angsuran = 0;
            $profit = 0;
            $angsuran = 0;

            // Iterate through each project to calculate total income and expenditure
            foreach ($proyeks as $proyek) {
                $total_uang_masuk += $proyek->uangmasuk->sum('jumlah_pembayaran');
                $total_uang_keluar += $proyek->uangkeluar->sum('total_harga');
                $angsuran += UangMasuk::where('id_proyek', $proyek->id)
                                ->where('jenis_pembayaran', 'LIKE', '%' . 'angsuran' . '%')
                                ->count();
            }

            $sisa_angsuran = $harga_proyek - $total_uang_masuk;

            if ($sisa_angsuran <= 0) {
                $sisa_angsuran = 'Lunas';
                $profit = $total_uang_masuk- $total_uang_keluar;
               
            } else 
            {
            $sisa_angsuran;
            $profit ='-'. $sisa_angsuran+$total_uang_keluar;
             
            }
            if ($angsuran>0){
                $angsuran;
            }
            else{
                $angsuran = 'cash';
            }

            // Add customer report data to the $laporan array
            $laporan[] = [
                'nama_pelanggan' => $pelanggan->nama_pelanggan, // Adjusted to use correct field from $pelanggan
                'total_proyek' => $total_proyek,
                'harga_proyek' => format_rupiah($harga_proyek),
                'total_uang_masuk' => format_rupiah( $total_uang_masuk),
                'total_uang_keluar' => format_rupiah($total_uang_keluar),
                'sisa_angsuran' =>format_rupiah($sisa_angsuran),
                'profit' =>format_rupiah($profit),
                'angsuran' => $angsuran,
                // Add additional fields as needed, like 'hari_tanggal' and 'lokasi_proyek'
            ];
        }

        // Return the view 'laporanpelanggan.blade.php' with compacted $laporan data
        return view('laporanpelanggan', compact('laporan'));
    }
    public function exportExcel()
    {
        return Excel::download(new LaporanPelangganExport, 'laporan_pelanggan.xlsx');
    }
}
