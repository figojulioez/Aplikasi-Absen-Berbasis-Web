<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use Illuminate\Support\Facades\Storage;
use App\Models\shift;
use App\Models\dataAbsensi;
use Illuminate\Support\Str;
use App\Models\laporan;
use App\Models\preLaporan;

class dataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 5;
        if ( request()->exists('show') ) {
            $page = request()->get('show'); 
        }

        // return view('admin.dataKaryawan', [
        //     'karyawan' => karyawan::paginate($page)->withQueryString()
        // ]);

        return view('admin.dataKaryawan', [
            'karyawan' => karyawan::paginate($page)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => ['required','max:20'],
            'img' => ['image', 'file', 'max:2048'],
            'idk' => ['required', 'unique:karyawans,id','integer'],
            'dpt' => ['required']
        ]);
        $validateData['img'] = $request->file('img')->store('img');

        karyawan::create([
            'nama' => $validateData['nama'],
            'qrCode' => Str::random(10),
            'gambar' => $validateData['img'],
            'id' => $validateData['idk'],
            'dpt' => $validateData['dpt']
        ]);

        shift::create([
            'karyawan_id' => $validateData['idk'],
            'jamShift' => '08.00 - 17.00',
            'sesiShift' => 1,
            'jamPulang' => 17
        ]);        

        dataAbsensi::create([
            'karyawan_id' => $validateData['idk'],
            'status' => 'Pulang'
        ]);

        return redirect('/data-karyawan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validateData = $request->validate([
            'nama' => ['required','max:30'],
            'img' => [''],
            'idk' => ['required', 'integer'],
            'dpt' => ['required'],
            'id'=> ['required', 'integer'],
            'gambarLama' => ['required']
        ]);


        $gambar = $validateData['gambarLama'];
        if ( $request->file('img') ) {
           Storage::delete($validateData['gambarLama']);
           $gambar = $request->file('img')->store('img');
       }

       karyawan::where('id', $validateData['idk'])->update([
        'id' => $validateData['id'],
        'nama' => $validateData['nama'],
        'gambar' => $gambar,
        'dpt' => $validateData['dpt']
    ]);

       shift::where('karyawan_id', $validateData['idk'])->update([
        'karyawan_id' => $validateData['id']
    ]);

       dataAbsensi::where('karyawan_id', $validateData['idk'])->update([
        'karyawan_id' => $validateData['id']
    ]);

       laporan::where('karyawan_id', $validateData['idk'])->update([
        'karyawan_id' => $validateData['id']
    ]);

       preLaporan::where('karyawan_id', $validateData['idk'])->update([
        'karyawan_id' => $validateData['id']
    ]);

       return redirect('data-karyawan');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $preLaporan = preLaporan::where('karyawan_id', $id);
        $laporan = laporan::where('karyawan_id', $id);


        if ( $preLaporan->exists() ) {
            
           session()->flash('error', 'Karyawan belum melakukan absensi pulang, penghapusan data dibatalkan');
           return redirect('data-karyawan');
       }
       
       karyawan::where('id', $id)->delete();

       shift::where('karyawan_id', $id)->delete();

       dataAbsensi::where('karyawan_id', $id)->delete();

       return redirect('data-karyawan');
   }
}
