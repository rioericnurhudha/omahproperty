<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanTransaksi;

class KegiatanTransaksiController extends Controller
{
    public function kegiatantransaksi(){
        $data = KegiatanTransaksi::all();
        return view('kegiatantransaksi', compact('data'));
    }
}
