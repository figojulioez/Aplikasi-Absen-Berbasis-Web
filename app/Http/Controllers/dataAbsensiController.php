<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataAbsensi;
use App\Models\karyawan;

class dataAbsensiController extends Controller 
{

    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
    //     $karyawan = dataAbsensi::paginate(2)->withQueryString();
    //     if ( request()->has('page') ) {
    //         $p = request()->get('page');

    //     }
    //     dd($karyawan);
        $page = 5;
        $ket = '';
        if ( request()->exists('show') || request()->exists('ket') ) {
            $page = request()->get('show'); 
            $ket = request()->get('ket');
        }

        $dataAbsensi = dataAbsensi::show($ket)->paginate($page)->withQueryString();
        return view('admin.dataAbsensi', [
            'dataAbsensi' => $dataAbsensi
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
