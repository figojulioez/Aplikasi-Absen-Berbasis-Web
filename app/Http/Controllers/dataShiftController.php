<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shift;
use App\Models\preLaporan;

class dataShiftController extends Controller
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
        return view('admin.dataShift', [
            'shift' => shift::detail()->latest()->paginate($page)->withQueryString()
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
        //
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
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'shift' => ['required'],
            'id' => ['integer', 'required']
        ]);
        
        $shift = shift::find($validateData['id']);
        $preLaporan = preLaporan::where('karyawan_id', $shift->karyawan_id)->get();
        if ( $preLaporan->count() >= 1 ) {
            
            
            session()->flash('error', 'Karyawan belum melakukan absensi pulang, pergantian shift tidak dapat dilakukan');
            return redirect('/data-shift');
        } 


        if ( $validateData['shift'] == 1 ) {
            $jam = '08.00 - 17.00';
            $jamPulang = 17;
        } elseif ( $validateData['shift'] == 2 ) {
            $jam = '14.00 - 23.00';
            $jamPulang = 23;
        } else if ( $validateData['shift'] == 3 ) {
            $jam = '23.00 - 08.00';
            $jamPulang = 8;
        }

        $shift->jamShift = $jam;
        $shift->sesiShift = $validateData['shift'];
        $shift->jamPulang = $jamPulang;
        $shift->save();

        return redirect('/data-shift');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
