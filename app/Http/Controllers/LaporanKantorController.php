<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKantor;

class LaporanKantorController extends Controller
{
    public function laporankantor(){
        $data = LaporanKantor::all();
        return view('laporankantor', compact('data'));
    }
}
