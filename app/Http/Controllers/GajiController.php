<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index(){
        $gajitepat = 150000;
        $gajitelat = 100000;
        $auth = auth()->user()->nip;
        $gajiPegawai = Presensi::where('user_nip', $auth)->orderBy('id', 'DESC')->get();
        return view('dashboard.karyawan.gaji')->with(compact('gajiPegawai', 'gajitepat', 'gajitelat'));
    }
}
