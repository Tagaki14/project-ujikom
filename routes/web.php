<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;

//Frontend
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/rooms', [FrontendController::class, 'kamar']);
Route::get('/facilities', [FrontendController::class, 'fasilitas']);
Route::get('/kontak', [FrontendController::class, 'kontak']);

//pelanggan
Route::middleware('ispelanggan')->group(function () {
    //reservasi
    Route::post('/cekkamar', [FrontendController::class, 'cekkamar']);
    Route::post('/pemesanan', [FrontendController::class, 'reservasi']);
    Route::post('/konfirmasi', [FrontendController::class, 'konfirmasi']);
    Route::get('/getreservasi', [FrontendController::class, 'getReservasi']);
    Route::get('/bayarinvoice/{reservasi}', [FrontendController::class, 'bayarInvoice']);
    Route::post('/konfirmasibayar', [FrontendController::class, 'konfirmasiBayar']);
    Route::get('/cetakinvoice/{reservasi}', [FrontendController::class, 'cetakInvoice']);
});

//User pelanggan
Route::get('/loginuser', [UserLoginController::class, 'index'])->name('login.pelanggan')->middleware('isguest');
Route::post('/loginuser', [UserLoginController::class, 'authenticate']);
Route::get('/registeruser', [UserLoginController::class, 'registrasi']);
Route::post('/registeruser', [UserLoginController::class, 'prosesRegister']);
Route::get('/logoutuser', [UserLoginController::class, 'logout']);

//User Admin
Route::get('/login', [LoginController::class, 'index'])->name('login.admin')->middleware('isguest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

//User
Route::middleware('isadmin')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/edit/{user}', [UserController::class, 'edit']);
    Route::put('/user', [UserController::class, 'update']);
    Route::get('/user/delete/{user}', [UserController::class, 'destroy']);

    //Kamar
    Route::get('/kamar', [KamarController::class, 'index']);
    Route::post('/getKamarById', [KamarController::class, 'getKamarById']);
    Route::get('/kamar/create', [KamarController::class, 'create']);
    Route::post('/kamar', [KamarController::class, 'store']);
    Route::get('/kamar/edit/{kamar}', [KamarController::class, 'edit']);
    Route::put('/kamar', [KamarController::class, 'update']);
    Route::get('/kamar/delete/{kamar}', [KamarController::class, 'destroy']);
    Route::post('/ruang', [KamarController::class, 'tambahRuang']);
    Route::get('/ruang/delete/{detailkamar}', [KamarController::class, 'delete']);

    //Fasilitas Kamar
    Route::get('/fasilitaskamar', [FasilitasKamarController::class, 'index']);
    Route::post('/getFasilitasKamarById', [FasilitasKamarController::class, 'getFasilitasKamarById']);
    Route::get('/fasilitaskamar/create', [FasilitasKamarController::class, 'create']);
    Route::post('/fasilitaskamar', [FasilitasKamarController::class, 'store']);
    Route::get('/faskamar/edit/{fasilitas}', [FasilitasKamarController::class, 'edit']);
    Route::put('/fasilitaskamar', [FasilitasKamarController::class, 'update']);
    Route::get('/faskamar/delete/{fasilitas}', [FasilitasKamarController::class, 'destroy']);
    Route::get('/fasilitaskamar/pilih/{id}', [FasilitasKamarController::class, 'pilihFasilitas']);
    Route::post('/pilihfasilitas', [FasilitasKamarController::class, 'simpanDetailFasilitas']);

    //Fasilitas hotel
    Route::get('/fasilitashotel', [FasilitasHotelController::class, 'index']);
    Route::post('/getFasilitasHotelById', [FasilitasHotelController::class, 'getFasilitasHotelById']);
    Route::get('/fasilitashotel/create', [FasilitasHotelController::class, 'create']);
    Route::post('/fasilitashotel', [FasilitasHotelController::class, 'store']);
    Route::get('/fashotel/edit/{fasilitas}', [FasilitasHotelController::class, 'edit']);
    Route::put('/fasilitashotel', [FasilitasHotelController::class, 'update']);
    Route::get('/fashotel/delete/{fasilitas}', [FasilitasHotelController::class, 'destroy']);
    
    //Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/delete/{pelanggan}', [FasilitasHotelController::class, 'destroy']);
    
    //Tamu
    Route::get('/tamu', [TamuController::class, 'index']);
    Route::get('/tamu/create', [TamuController::class, 'create']);
    Route::post('/tamu', [TamuController::class, 'store']);
    Route::get('/tamu/edit/{tamu}', [TamuController::class, 'edit']);
    Route::put('/tamu', [TamuController::class, 'update']);
    Route::get('/tamu/delete/{tamu}', [TamuController::class, 'destroy']);

    //Reservasi
    Route::get('/reservasi', [ReservasiController::class, 'index']);
    Route::get('/reservasi/checkin/{reservasi}', [ReservasiController::class, 'checkin']);
    Route::post('/reservasi/checkin', [ReservasiController::class, 'prosesCheckin']);
    Route::get('/reservasi/checkout/{reservasi}', [ReservasiController::class, 'checkout']);
    
    //Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);


});

