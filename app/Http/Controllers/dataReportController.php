<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laporan;
use App\Models\shift;
use App\Models\preLaporan;

class dataReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date('Y-m-d');
        $laporan = laporan::where('tanggalReport', 'like', $dateNow.'%')->latest()->with('karyawan')->get();

        if ( request()->has('keyDate') ) {
            $laporan = laporan::where('tanggalReport', 'like', request()->get('keyDate').'%')->with('karyawan')->latest()->get();            
        }

        return view('admin.dataReport.index', [
            'laporan' => $laporan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataReport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => ['required'],
            'id' => ['integer', 'required'],
            'tanggal'=> ['required'],
            'keterangan' => ['required'],
        ]);

        $tanggal = $validateData['tanggal'];
        $tahun = explode("/", $tanggal)[2];
        $bulan = explode("/", $tanggal)[1];
        $hari = explode("/", $tanggal)[0];

        $tanggal = $tahun . '-' . $bulan . '-' . $hari;

        $preLaporan = preLaporan::where('karyawan_id', $validateData['id']);
        if ( $preLaporan->exists() ) {
            session()->flash('error', 'Karyawan sudah melakukan absensi');
            return redirect('/data-laporan/create');
        }

        date_default_timezone_set("Asia/Jakarta");
            $laporan = laporan::where('tanggalReport', $tanggal)->where('karyawan_id', $validateData['id'])->first();
            $laporanPulang = 0;
            if ( laporan::where('tanggalReport', $tanggal)->where('karyawan_id', $validateData['id'])->count() > 0 ) {
                $laporanPulang += intval(explode(':',$laporan->jamPulang)[0]);
            }

            if(laporan::where('tanggalReport', $tanggal)->where('karyawan_id', $validateData['id'])->count() > 0  && $laporanPulang + 1 > date('H'))
            {

                session()->flash('error', 'Karyawan sudah melakukan absensi, mohon tunggu selama 1 jam lalu buat laporan sekali lagi');
                return redirect('/data-laporan/create');
            }

        laporan::create([
            'karyawan_id' => $validateData['id'],
            'waktuKerja' => 0,
            'jamMasuk' => 0,
            'jamPulang' => 0,
            'keterangan' => $validateData['keterangan'],
            'overtime' => 0,
            'dataShift' => shift::where('karyawan_id', $validateData['id'])->first()->sesiShift,
            'tanggalReport' => $tanggal,
            'time' => 0
        ]);           

        return redirect('data-laporan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = request()->validate([
            'tanggal' => ['required']
        ]);

        laporan::where('id', $id)->where('tanggalReport','like', '%' . $request['tanggal'] . '%')->delete();
        return redirect('data-laporan');    
    }
}
