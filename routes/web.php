<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/storeRegister', [AuthController::class, 'storeRegister']);
});


Route::middleware(['auth'])->group(function() {
    Route::middleware(['role:admin,user'])->group(function() {
        Route::get('/', function() {
            return view('pages.dasboard.index');
        });
        Route::get('/karyawan', [UserController::class, 'index']);
        Route::get('/izin', [IzinController::class, 'index']);


        // absen
        Route::get('/absensi', [AbsensiController::class, 'index']);
        Route::get('/tambahabsensi', [AbsensiController::class, 'jammasuk']);
        Route::post('/store/tambahabsensi', [AbsensiController::class, 'storejammasuk']);

        Route::get('/jamkeluar/{id}',[AbsensiController::class,'jamkeluar']);
        Route::post('/store/tambahjamkeluar', [AbsensiController::class, 'storejamkeluar']);

        Route::get('/jamlembur/{id}',[AbsensiController::class,'jamlembur']);
        Route::post('/store/jamlembur/{id}', [AbsensiController::class, 'storejamlembur']);

        Route::get('/editabsen/{id}',[AbsensiController::class,'edit']);
        Route::post('/updateabsensi/{id}',[AbsensiController::class,'update']);
        Route::get('/destroy/absensi/{id}',[AbsensiController::class,'destroy']);


        // izin
        Route::get('/tambahizin', [IzinController::class, 'create']);
        Route::post('/store/tambahizin', [IzinController::class, 'storeIzin']);
        Route::get('/editizin/{id}',[IzinController::class,'edit']);
        Route::post('/updateizin/{id}',[IzinController::class,'updateizin']);


        Route::get('/keterangan/{id}', [IzinController::class, 'tambahketerangan']);
        Route::post('/store/tambahketerangan/{id}', [IzinController::class, 'storeketerangan']);
        Route::get('/detailizin/{id}',[IzinController::class,'detailizin']);




        Route::get('/kategori',[KategoriController::class,'index']);

        Route::get('/tambahkategoriizin', [KategoriController::class, 'create']);
        Route::post('/store/kategori', [KategoriController::class, 'store']);


        Route::get('/profile', [AuthController::class, 'profile']);
        Route::get('/logout', [AuthController::class, 'logout']);


        Route::get('/editkategori/{id}', [KategoriController::class, 'edit']);
        Route::post('/updatekategori/{id}', [KategoriController::class, 'update']);

        Route::get('/detail',function(){
            return view('pages.karyawan.detail');
        });
    });

    Route::middleware(['role:admin'])->group(function() {
        Route::get('/tambahkaryawan', [KaryawanController::class, 'create']);
        Route::post('/store/karyawan', [KaryawanController::class, 'store']);
        Route::post('/karyawan', [KaryawanController::class, 'karyawan']);
        Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
        Route::get('/karyawan/detail/{id}', [KaryawanController::class, 'detail']);
        Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update']);
        Route::get('/destroy/{id}', [KaryawanController::class, 'destroy']);




        Route::post('/izin', [IzinController::class, 'izin']);
        Route::get('/izin/edit/{id}', [IzinController::class, 'edit']);
    });
});
