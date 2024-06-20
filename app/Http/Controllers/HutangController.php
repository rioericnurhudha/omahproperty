<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    public function daftarHutang(Request $request){
        // $data = new Hutang();

        // if($request->get('search')){
        //     $data = $data->where('nama_barang', 'LIKE', '%'.$request->get('search').'%')
        //     ->orWhere('nama_toko', 'LIKE', '%'.$request->get('search').'%');
        // }
        // $data = $data->get();
        return view('hutang');
    }
}
