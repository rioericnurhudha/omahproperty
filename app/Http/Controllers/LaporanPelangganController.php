<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPelangganExport;
use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPelangganController extends Controller
{
    public function searchLaporanPelanggan(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $daftar_pelanggan = DaftarPelanggan::where('nama_pelanggan', 'LIKE', '%' . $search . '%')->get();
        } else {
            $daftar_pelanggan = DaftarPelanggan::all();
        }
        
        $laporan = $this->generateLaporan($daftar_pelanggan);

        return view('laporanpelanggan', compact('laporan', 'search', 'request'));
    }

    public function laporanpelanggan()
    {
        $daftar_pelanggan = DaftarPelanggan::all();
        $laporan = $this->generateLaporan($daftar_pelanggan);

        return view('laporanpelanggan', compact('laporan'));
    }

    private function generateLaporan($daftar_pelanggan)
    {
        $laporan = [];

        foreach ($daftar_pelanggan as $pelanggan) {
            $proyeks = Proyek::where('id_pelanggan', $pelanggan->id)->get();
            $harga_proyek = $proyeks->sum('harga_proyek');
            $total_proyek = $proyeks->count();
            $total_uang_masuk = 0;
            $total_uang_keluar = 0;
            $sisa_angsuran = 0;
            $profit = 0;
            $angsuran = 0;

            foreach ($proyeks as $proyek) {
                $total_uang_masuk += $proyek->uangmasuk->sum('jumlah_pembayaran');
                $total_uang_keluar += $proyek->uangkeluar->sum('total_harga');
                $angsuran += UangMasuk::where('id_proyek', $proyek->id)
                    ->where('jenis_pembayaran', 'LIKE', '%' . 'angsuran' . '%')
                    ->count();
            }

            $sisa_angsuran = $harga_proyek - $total_uang_masuk;
            $profit = $total_uang_masuk - $total_uang_keluar;

            if ($sisa_angsuran <= 0) {
                $sisa_angsuran = 'Lunas';
            } else {
                $profit = '-' . $sisa_angsuran + $total_uang_keluar;
            }

            if ($angsuran == 0) {
                $angsuran = 'cash';
            }

            $laporan[] = [
                'nama_pelanggan' => $pelanggan->nama_pelanggan,
                'total_proyek' => $total_proyek,
                'harga_proyek' => format_rupiah($harga_proyek),
                'total_uang_masuk' => format_rupiah($total_uang_masuk),
                'total_uang_keluar' => format_rupiah($total_uang_keluar),
                'sisa_angsuran' => format_rupiah($sisa_angsuran),
                'profit' => format_rupiah($profit),
                'angsuran' => $angsuran,
            ];
        }

        return $laporan;
    }

    public function exportExcel()
    {
        return Excel::download(new LaporanPelangganExport, 'laporan_pelanggan.xlsx');
    }
}