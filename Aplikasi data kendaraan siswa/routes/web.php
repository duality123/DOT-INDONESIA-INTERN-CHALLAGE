<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KendaraanSiswaController;
use App\Http\Controllers\SiswaControllerAPI;
use App\Http\Controllers\KendaraanControllerAPI;
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

/*
* Routes Siswa
*/

Route::get('',[SiswaController::class, 'index'])->middleware('auth');#route section siswa
Route::get('/siswa',[SiswaController::class, 'index'])->middleware('auth');#route section siswa#route section siswa
Route::get('siswa/hapus_siswa/{id}',[SiswaController::class, 'hapus_siswa_view'])->middleware('auth');#route section hapus siswa
Route::any('siswa/tambah_siswa',[SiswaController::class, 'tambah_siswa_view'])->middleware('auth'); #route section tambah siswa
Route::post('siswa/ubah_siswa/',[SiswaController::class, 'ubah_siswa_view'])->middleware('auth'); #route section tambah siswa
Route::get('siswa/halaman_ubah/{id}',[SiswaController::class, 'halaman_ubah_siswa_view'])->middleware('auth'); #route halaman ubah siswa
Route::get('login',[LoginController::class, 'login'])->name('login'); #route halaman ubah siswa
Route::get('logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth'); #route halaman ubah siswa
Route::post('autentikasi',[LoginController::class, 'autentikasi'])->name('autentikasi');#route halaman ubah siswa

/*
* Routes Kendaraan
*/

Route::get('/kendaraan',[KendaraanSiswaController::class, 'index'])->middleware('auth'); #route halaman ubah siswa
Route::any('kendaraan/tambah_kendaraan',[KendaraanSiswaController::class, 'tambah_kendaraan_view'])->middleware('auth'); #route 
Route::any('kendaraan/hapus_kendaraan/{id}',[KendaraanSiswaController::class, 'hapus_kendaraan_view'])->middleware('auth'); #route 
Route::any('kendaraan/halaman_ubah_kendaraan/{id}',[KendaraanSiswaController::class, 'halaman_ubah_kendaraan_view'])->middleware('auth'); #route halaman ubah siswa
Route::any('kendaraan/ubah_kendaraan',[KendaraanSiswaController::class, 'ubah_kendaraan_view'])->middleware('auth');


//Routes API


Route::get('/api/lihat_semua_siswa', [SiswaControllerAPI::class,'index']);
Route::get('/api/lihat_siswa/{id}', [SiswaControllerAPI::class,'show']);
Route::get('/api/lihat_semua_kendaraan', [KendaraanControllerAPI::class,'index']);
Route::get('/api/lihat_kendaraan/{id}', [KendaraanControllerAPI::class,'show']);