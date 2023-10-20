<?php

namespace App\Http\Controllers\bantuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;
use App\Models\dataAbsensi;
use App\Models\shift;
use App\Models\laporan;
use App\Models\preLaporan;

class scanQr extends Controller
{
    public  $waktuScan, // Saat dia melakukan scan function yang digunakan date(H:i) 
            $waktuShift, // Waktu shift dia contoh : 08:00-17:00 
            $jamPulang, //  Jam pulang dia diambil dari $waktuShift contoh : 17:00
            $jamShift,  // Jam dia masuk diambil dari $waktuShift contoh : 08:00 
            $menitShift, // Menit dia masuk diambil dari $waktuShift contoh : 00
            $jamScan, // Jam dia melakukan scanner diambil dari $waktuScan 
            $menitScan, // Menit dia melakukan scanner diambil dari $waktuScan
            $time, // Limit Waktu
            $jamTime; // Nilai yang akan dikembalikan

            public function __construct ($karyawan) {
                date_default_timezone_set('Asia/Jakarta');
                $this->waktuScan = date('H:i'); 
                $this->waktuShift = explode(' - ',shift::where('karyawan_id',$karyawan[0]->id)->first()->jamShift)[0];

                $this->jamPulang = explode('.',explode(' - ',shift::where('karyawan_id',$karyawan[0]->id)->get()[0]->jamShift)[1])[0];
                $this->jamShift = intval(explode('.',$this->waktuShift)[0]);
                $this->menitShift = intval(explode('.',$this->waktuShift)[1]);
                $this->jamScan = intval(explode(':',$this->waktuScan)[0]);
                $this->menitScan = intval(explode(':',$this->waktuScan)[1]);
                $this->jamTime = 0;
                $this->time = 0;
        }
    }
