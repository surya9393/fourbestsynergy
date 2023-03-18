<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PresensiController extends Controller
{
    public function index(){
        $auth = auth()->user()->nip;
        $dataTerakhir = Presensi::where('user_nip', $auth)->orderBy('id', 'DESC')->first();
        $dataPresensi = Presensi::where('user_nip', $auth)->orderBy('id', 'DESC')->get();
        return view('dashboard.karyawan.presensi')->with(compact('dataTerakhir', 'dataPresensi'));
    }

    public function hadir(Request $request){

        $hari = Carbon::now();
        $jam = Carbon::now()->format('H:i:s');
        $batasWaktu = '08:05:00';
        if($jam > $batasWaktu){
            $gaji = 100000;
        }
        if($jam < $batasWaktu)
        {
            $gaji = 150000;    
        }

        $hadir = new Presensi;
        $hadir->name = $request->name;
        $hadir->user_nip = $request->user_nip;
        $hadir->tanggaldatang = $hari;
        $hadir->jamdatang = $jam;
        $hadir->save();

        $hadir = new Gaji;
        $hadir->user_nip = $request->user_nip;
        $hadir->gaji = $gaji;
        $hadir->save();
        return redirect('/presensi')->with('suksesPresensi', 'selamat');
    }
    
    public function pulang(Request $request){
        Presensi::where('id', $request->id)->update([
            'jampulang' => Carbon::now(),
            'tanggalpulang' => Carbon::now()
        ]);
        return redirect('/presensi')->with('suksesPresensi', 'selamat');
    }

}
