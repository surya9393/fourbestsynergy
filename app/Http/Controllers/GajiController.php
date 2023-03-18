<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Presensi;
use App\Models\Rekapgaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index(){
        $gajitepat = 150000;
        $gajitelat = 100000;
        $auth = auth()->user()->nip;
        $gajiPegawai = Gaji::where('user_nip', $auth)->orderBy('id', 'DESC')->get();
        return view('dashboard.karyawan.gaji')->with(compact('gajiPegawai', 'gajitepat', 'gajitelat'));
    }

    public function rekap(){
        $tepat = Gaji::where('gaji', '150000')->count();
        $telat = Gaji::where('gaji', '100000')->count();

        $totalgajitelat = '100000' * $telat;
        $totalgajitepat = '150000' * $tepat;
        $totalgaji = $totalgajitelat+$totalgajitepat;

        $auth = auth()->user()->nip;
        
        $gaji = new Rekapgaji;
        $gaji->user_nip = $auth;
        $gaji->gaji = $totalgaji;
        $gaji->save();

        Gaji::query()->truncate();

        return redirect('/gaji')->with('success', 'successfull');
    }

    public function report(){
        $auth = auth()->user()->nip;
        $report = Rekapgaji::where('user_nip', $auth)->get();
        return view('dashboard.karyawan.report')->with(compact('report'));
    }
}
