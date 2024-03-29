<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/backup', function () {
    return view('backup');
});

Route::get('/data', function(){
	$data = DB::table('tb_karyawan_2')->select('nama')->inRandomOrder()->get();

	$karyawan = [];
	foreach ($data as $val) {
		$karyawan[] = $val->nama;
	}
	return $karyawan;
});