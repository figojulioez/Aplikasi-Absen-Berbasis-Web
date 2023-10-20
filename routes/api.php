<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\dataAbsensiResource;
use App\Models\dataAbsensi;
use App\Http\Resources\karyawanResource;
use App\Models\karyawan;
use App\Models\shift;
use App\Http\Resources\shiftResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/dataAbsensi/check', function (request $request) {
    return  dataAbsensiResource::collection(dataAbsensi::detail($request->get('nama'))->show($request->get('ket'))->paginate($request->get('show')) );

});


Route::get('/karyawan/check', function (request $request) {
    return karyawanResource::collection(karyawan::detail($request->get('nama'))->paginate($request->get('show')) );
})->middleware(['admin','auth:sanctum']);

Route::get('/dataShift/check', function (request $request) {
    return shiftResource::collection(shift::detail($request->get('nama'))->paginate($request->get('show')) );
});

Route::get('/karyawan/edit', function (request $request) {
    return new karyawanResource(karyawan::check($request->get('id'))->get());
})->middleware(['admin','auth:sanctum']);
