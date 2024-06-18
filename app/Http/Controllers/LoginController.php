<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $data = $request->only('email', 'password');

        $admin = Admin::where('email', $data['email'])->first();

        // Memeriksa apakah ada pengguna dengan email yang diberikan
        if ($admin) {
            // Memeriksa apakah password cocok
            if (Hash::check($data['password'], $admin->password)) {
                // Mencoba otentikasi menggunakan guard 'admin'
                if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    // Jika berhasil, redirect ke dashboard atau halaman admin
                    return redirect()->intended('/admin/dashboard');
                }
            }
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil keluar!');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerProccess(Request $request){
        $data = $request->validate([
            // validasi data input
            'nama'      => 'required|string|max:255',
            'alamat'      => 'required|string|max:255',
            'no_hp'      => 'required|string|max:255',
            'email'     => 'required|string|max:255|unique:admin,email',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required| min:4'
        ]);
        if (Admin::where('email', $data['email'])->count() == 1) {
            return redirect()->route('register')->with('failed', 'Email Telah Digunakan');
        }
        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'data tersimpan');
    }
}
