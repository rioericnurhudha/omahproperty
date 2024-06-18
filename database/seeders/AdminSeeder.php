<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\DaftarPelanggan;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama'      => 'rara',
            // hash::make('inipassword) digunakan untuk mengenskripsi
            'password' => Hash::make('rara@gmail.com'),
            'alamat'    => 'madukoro',
            'email'     => 'rara@gmail.com',
            'no_hp'     => '0895354969666',
        ]);


        // DB::table('admins')->insert([
        //     'nama'=>'rara',
        //     'password'=>'12345',
        //     'alamat'=> 'madukoro',
        //     'email'=>'rara@gmail.com',
        //     'no_hp'=>'0895354969666'
        // ]);
    }
}
