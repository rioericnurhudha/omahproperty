<?php

namespace App\Exports;

use App\Http\Controllers\Controller;
use App\Models\DaftarPelanggan;
use App\Models\Proyek;
use App\Models\UangMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPelangganExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $daftar_pelanggan = DaftarPelanggan::all();

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

            if ($sisa_angsuran <= 0) {
                $sisa_angsuran = 'Lunas';
                $profit = $total_uang_masuk- $total_uang_keluar;
            } 
            else {
                $sisa_angsuran;
                $profit ='-'. $sisa_angsuran+$total_uang_keluar;            }

            if ($angsuran > 0) {
                $angsuran;
            } else {
                $angsuran = 'cash';
            }

            $laporan[] = [
                'nama_pelanggan' => $pelanggan->nama_pelanggan, // Adjusted to use correct field from $pelanggan
                'total_proyek' => $total_proyek,
                'harga_proyek' => format_rupiah($harga_proyek),
                'total_uang_masuk' => format_rupiah( $total_uang_masuk),
                'total_uang_keluar' => format_rupiah($total_uang_keluar),
                'sisa_angsuran' =>format_rupiah($sisa_angsuran),
                'profit' =>format_rupiah($profit),
                'angsuran' => $angsuran,
            ];
        }

        return collect($laporan);
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Total Proyek',
            'Harga Proyek',
            'Total Uang Masuk',
            'Total Uang Keluar',
            'Sisa Angsuran',
            'Profit',
            'Angsuran',
        ];
    }
}