<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

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
    Route::get('/', [ObatController::class, 'daftar_obat']);
    Route::post('/add', [ObatController::class, 'tambah_obat']);
    Route::post('/edit/{id}', [ObatController::class, 'ubah_jumlah']);
    Route::post('/hapus/{id}', [ObatController::class, 'hapus_obat']);
});