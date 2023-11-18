<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard_C;
use App\Http\Controllers\dataAbsensiController;
use App\Http\Controllers\dataKaryawanController;
use App\Http\Controllers\dataShiftController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\scanQr;
use App\Http\Controllers\dataReportController;
use App\Models\laporan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () { return redirect("/login"); });
Route::get('/login', [loginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [loginController::class, 'authenticate'])->middleware('guest');
Route::get('/scan-qr', function () {
	return view('scanQr');

})->middleware('guest');
Route::post('/scan-qr', [scanQr::class, 'absen']);
Route::get('/success', function () {
	return view('success');
})->middleware('guest');

Route::middleware(['admin','auth'])->group(function () {

	Route::get('/dashboard', [dashboard_C::class, 'show']);


	Route::resource('/data-karyawan', dataKaryawanController::class);

	Route::resource('/data-laporan', dataReportController::class);	
	Route::get('/laporan', function () { 
		$arr = collect(explode('-',request()->get('tanggal')));

		$jenis = 'Harian';
		if ( $arr->count() == 2 ) {
			$jenis = 'Bulanan';
		}

		return view('admin.laporan',[
			'laporans' => laporan::where('tanggalReport', 'like', '%'. request()->get('tanggal') . "%" )->latest()->with('karyawan')->get(),
			'jenis' => $jenis,
		]); });

	Route::get('/data-bulanan', function () {
		date_default_timezone_set('Asia/Jakarta');
		$dateNow = date('m');
		$laporan = laporan::where('tanggalReport', 'like', '%'.$dateNow.'%')->orderBy('tanggalReport', 'desc')->with('karyawan')->get();
		if ( request()->has('keyDate') ) {
			$laporan = laporan::where('tanggalReport', 'like', '%'.request()->get('keyDate').'%')->orderBy('tanggalReport', 'desc')->with('karyawan')->get();
		}	
		
		return view('admin.dataReport.dataBulanan', [
			'laporan' => $laporan,
		]);
	});
});

Route::resource('/data-shift', dataShiftController::class)->withTrashed(['edit']);


Route::get('/logout', function () {
	auth()->user()->tokens()->delete();
	Auth::logout();
	request()->session()->invalidate();

	request()->session()->regenerateToken();


	return redirect('login');
})->middleware('auth');

Route::resource('/data-absensi', dataAbsensiController::class);
