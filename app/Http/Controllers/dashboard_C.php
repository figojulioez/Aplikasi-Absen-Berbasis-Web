<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use App\Models\laporan;

class dashboard_C extends Controller
{
    public function show () {

        $karyawanTerbaik = '';
        $karyawanKurangBaik = '';

        $data = false;

        if ( laporan::count() > 0 ) {

        $karyawanTerbaik = laporan::select('time')->max('time');
        
        $karyawanTerbaik = laporan::where('time', '>=', $karyawanTerbaik)->with('karyawan')->get()[0];
        
        $karyawanKurangBaik = laporan::select('time')->min('time');
        $karyawanKurangBaik = laporan::where('time', '=', $karyawanKurangBaik)->with('karyawan')->get()[0];
        $data = true;
        }
        return view('admin.dashboard', [
            'karyawanTerbaik' => $karyawanTerbaik,
            'karyawanKurangBaik' => $karyawanKurangBaik,
            'data' => $data
        ]);
    }
}
