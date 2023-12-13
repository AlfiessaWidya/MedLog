<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;

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

Route::prefix('/')->group(function () {
    Route::get('/', [AdminController::class, 'daftar_staff']);
    Route::post('/add', [AdminController::class, 'tambah_staff']);
    Route::post('/edit/{id}', [AdminController::class, 'ubah_staff']);
    Route::post('/hapus/{id}', [AdminController::class, 'hapus_staff']);
    Route::get('/cari-staff', [AdminController::class, 'cari_staff']);


    // Route::get('/', [ObatController::class, 'daftar_obat']);
    // Route::post('/add', [ObatController::class, 'tambah_obat']);
    // Route::post('/edit/{id}', [ObatController::class, 'ubah_jumlah']);
    // Route::post('/hapus/{id}', [ObatController::class, 'hapus_obat']);
    // Route::get('/cari-obat', [ObatController::class, 'cari_obat']);

    // Route::get('/print', [ObatController::class, 'cetak_obat']);

    // Route::get('/riwayat', [RiwayatController::class, 'index']);
});