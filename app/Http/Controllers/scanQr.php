<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use App\Models\dataAbsensi;
use App\Models\shift;
use App\Models\laporan;
use App\Models\preLaporan;

class scanQr extends Controller 
{
    public function absen (Request $request) {
        $validateData = $request->validate([
            'qr' => ['required']
        ]);

        $karyawan = karyawan::where('qrCode','=',$validateData['qr']);
        if(!$karyawan->exists())
        {

            session()->flash('error', 'Kode Qr anda tidak terdaftar');
            return redirect('/scan-qr');
        }

        $karyawan = $karyawan->get();
        $waktu = new bantuan\scanQr($karyawan);

        // Masuk
        if ( dataAbsensi::firstWhere('karyawan_id', $karyawan[0]->id)->status === 'Pulang' ) 
        {
            // date_default_timezone_set("Asia/Jakarta");
            // $laporan = laporan::where('tanggalReport', date('Y-m-d'))->where('karyawan_id', $karyawan[0]->id)->first();
            // $laporanPulang = 0;
            // if ( laporan::where('tanggalReport', date('Y-m-d'))->where('karyawan_id', $karyawan[0]->id)->count() > 0 ) {
            //     $laporanPulang += intval(explode(':',$laporan->jamPulang)[0]);
            // }


            // if(laporan::where('tanggalReport', date('Y-m-d'))->where('karyawan_id', $karyawan[0]->id)->count() > 0  && $laporanPulang + 2 > $waktu->jamScan)
            // {

            //     session()->flash('error', 'Anda sudah melewati batas melakukan absensi, Mohon Tunggu 2 jam atau hubungi admin');
            //     return redirect('/scan-qr');
            // }

            $ket = '';

            // Tepat Waktu
            if (  $waktu->jamShift > $waktu->jamScan  ) 
            {
                // Jam
                $jam = 8 + ($waktu->jamShift - $waktu->jamScan);
                $waktu->jamTime += $jam * 3600; 

                // // menit
                $menit = 60 - ($waktu->menitScan + $waktu->menitShift);
                $waktu->jamTime += time() + $menit * 60;
                $ket = 'Tepat Waktu';

            } 
            // Telat
            else if ($waktu->jamScan >= $waktu->jamShift ) 
            {
                // Jam
                $jam = 8 - ($waktu->jamScan - $waktu->jamShift);
                $waktu->jamTime += $jam * 3600; 

                $ket = 'Telat';

                if ( $waktu->jamScan === $waktu->jamShift && $waktu->menitScan <= 05 ) {
                    $ket = 'Tepat Waktu';
                }

                // menit
                $menit = 60 - ($waktu->menitScan - $waktu->menitShift);
                $waktu->jamTime +=  time() + ($menit * 60);



            }

            if ( $waktu->jamShift == 23 ) {
                if ( $waktu->jamScan >= 8 && $waktu->jamScan <= 17 ) {

                    session()->flash('error', 'Tolong perhatikan shift anda');
                    return redirect('/scan-qr');
                }                
            } else {
                if ( $waktu->jamScan >= $waktu->jamPulang ) {
                    session()->flash('error', 'Tolong perhatikan shift anda');
                    return redirect('/scan-qr');
                }
            }

            session()->flash('nama', 'Selamat Datang ' . $karyawan[0]->nama);

            session()->flash('gambar', $karyawan[0]->gambar);

            dataAbsensi::where('karyawan_id', $karyawan[0]->id)->update([
                'status' => 'Masuk',
            ]);


            preLaporan::create([
                'karyawan_id' => $karyawan[0]->id,
                'jamMasuk' => $waktu->waktuScan,
                'keterangan' => $ket,
                'time' => time()               
            ]);

            return redirect('/success');
        }    

            // Pulang
        else if  ( dataAbsensi::firstWhere('karyawan_id', $karyawan[0]->id)->status === 'Masuk'  ) 
        {

            $preLaporan = preLaporan::where('karyawan_id',$karyawan[0]->id)->get()[0];                
            $time = time() - $preLaporan->time;
            $waktuKerja = floor($time / 3600);

            $tahun = explode(' ',$preLaporan->created_at)[0];

            laporan::create([
                'karyawan_id' => $preLaporan->karyawan_id,
                'waktuKerja' => $waktuKerja,
                'jamMasuk' => $preLaporan->jamMasuk,
                'jamPulang' => $waktu->waktuScan,
                'keterangan' => $preLaporan->keterangan,
                'overtime' => ($waktuKerja > 9)? true:false,
                'dataShift' => shift::where('karyawan_id', $karyawan[0]->id)->first()->sesiShift,
                'tanggalReport' => $tahun,
                'time' => $time
            ]);           

            dataAbsensi::where("karyawan_id", $karyawan[0]->id)->update([
                'status' => 'Pulang'
            ]);


            session()->flash('nama', 'Selamat Pulang ' . $karyawan[0]->nama);

            session()->flash('gambar', $karyawan[0]->gambar);

            $preLaporan->delete();

            return redirect('/success');

        }
    }
}