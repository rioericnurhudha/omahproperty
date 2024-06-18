<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kas;

class KasController extends Controller
{
    public function kas(){
        $data = Kas::all();
        return view('kas', compact('data'));
    }

    public function kastambah(){
        return view ('kastambah');
    }

    public function kasinsert(Request $request){
        Kas::create($request->all());
        return redirect('kas')->with('success', 'Data berhasil ditambah!');
    }

    public function kastampil($id){
        $data = kas::find($id);
        return view ('kastampil', compact('data'));
    }

    public function kasupdate(Request $request, $id){
        $data = kas::find($id);
        $data->update($request->all());
        return redirect('kas')->with('success', 'Data berhasil diperbarui!');
    }

    public function kasdelete($id){
        $data = kas::find($id);
        $data->delete();
        return redirect('kas')->with('success', 'Data berhasil dihapus!');
    }
}
