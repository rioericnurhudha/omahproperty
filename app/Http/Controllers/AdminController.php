<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin(){
        $data = admin::all();
        return view ('admin', compact('data'));
    }

    public function admintambah(){
        return view('admintambah');
    }
    public function insertadmin(Request $request){
        admin::create($request->all());
        return redirect()->route('admin')->with('success', 'Data berhasil ditambahkan!');
    }

    public function admintampil($id){
        $data = admin::find($id);
        return view('admintampil', compact('data'));
    }

    public function adminupdate(Request $request, $id){
        $data = admin::find($id);
        $data->update($request->all());

        return redirect()->route('admin')->with('success', 'Data berhasil diubah!');
    }

    public function adminhapus(Request $request, $id){
        $data = admin::find($id);
        $data->delete($request->all());

        return redirect()->route('admin')->with('success', 'Data berhasil dihapus!');
    }

    public function create(Request $request){
        $request->validate([
            // validasi data input
            'nama'      => 'required|string|max:255',
            'alamat'      => 'required|string|max:255',
            'no_hp'      => 'required|string|max:255',
            'email'     => 'required|string|max:255|unique:admins,email',
            'password'  => 'required|string|min:8',
        ]);
        // simpa pengguna baru ke DB
        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password)
        ]);
    }
}
