<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\SessionController;

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
    Route::get('/', [AuthController::class,'index'])->name('login');
    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/proses_login', [AuthController::class,'proses_login'])->name('proses_login');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

    Route::post('/proses_register',[AuthController::class,'proses_register'])->name('proses_register');

    Route::group(['middleware' => ['auth']], function () {
        Route::group(['middleware' => ['cek_login:admin']], function () {
            Route::resource('admin', AdminController::class);
        });
        Route::group(['middleware' => ['cek_login:user']], function () {
            Route::resource('user', UserController::class);
        });
    });
    
    Route::get('/admin', [AdminController::class, 'daftar_staff']);
    Route::post('/admin/add', [AdminController::class, 'tambah_staff']);
    Route::post('/admin/edit/{id}', [AdminController::class, 'ubah_staff']);
    Route::post('/admin/hapus/{id}', [AdminController::class, 'hapus_staff']);
    Route::get('/admin/cari-staff', [AdminController::class, 'cari_staff']);


    Route::get('/warehouse', [ObatController::class, 'daftar_obat']);
    Route::post('/warehouse/add', [ObatController::class, 'tambah_obat']);
    Route::post('/warehouse/edit/{id}', [ObatController::class, 'ubah_jumlah']);
    Route::post('/warehouse/hapus/{id}', [ObatController::class, 'hapus_obat']);
    Route::get('/warehouse/cari-obat', [ObatController::class, 'cari_obat']);

    Route::get('/print', [ObatController::class, 'cetak_obat']);

    Route::get('/riwayat', [RiwayatController::class, 'index']);
});