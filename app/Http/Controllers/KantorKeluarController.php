<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KantorKeluar;

class KantorKeluarController extends Controller
{
    public function kantorkeluar(){
        $data = KantorKeluar::all();
        return view('kantorkeluar', compact('data'));
    }

    public function kantorkeluartambah(){
        return view ('kantorkeluartambah');
    }

    public function kantorkeluarinsert(Request $request){
        KantorKeluar::create($request->all());
        return redirect('kantorkeluar')->with('success', 'Data berhasil ditambah!');
    }

    public function kantorkeluartampil($id){
        $data = KantorKeluar::find($id);
        return view ('Kantorkeluartampil', compact('data'));
    }

    public function kantorkeluarupdate(Request $request, $id){
        $data = KantorKeluar::find($id);
        $data->update($request->all());
        return redirect('kantorkeluar')->with('success', 'Data berhasil diperbarui!');
    }

    public function kantorkeluardelete($id){
        $data = KantorKeluar::find($id);
        $data->delete();
        return redirect('kantorkeluar')->with('success', 'Data berhasil dihapus!');
    }
}
