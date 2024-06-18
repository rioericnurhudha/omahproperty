<?php

namespace App\Http\Controllers;
use App\Models\Direktur;

use Illuminate\Http\Request;

class DirekturController extends Controller
{
    public function direktur(){
        $data = direktur::all();
        return view('direktur', compact('data'));
    }

    public function direkturtambah(){
        return view('direkturtambah');
    }

    public function direkturinsert(Request $request){
        // dd($request);
        Direktur::create($request->all());
        return redirect('direktur')->with('success', 'data berhasil ditambahkan');
    }

    public function direkturtampil($id){
        $data = Direktur::find($id);
        return view('direkturtampil', compact ('data'));
    }

    public function direkturupdate(Request $request, $id){
        $data = Direktur::find($id);
        $data->update($request->all());
        return redirect()->route('direktur')->with('success', 'Data berhasil diperbarui!');

    }

    public function direkturdelete($id){
        $data = Direktur::find($id);
        $data->delete();
        return redirect()->route('direktur')->with('success', 'Data berhasil dihapus!');
    }
}
