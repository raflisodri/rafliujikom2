<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginController::class,'index']);
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('postLogin',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/loginmember',[HistoryController::class,'index']);
Route::post('/hasil',[HistoryController::class,'hasil']);

Route::middleware(['auth'])->group(function () {
    
Route::get('/dashboard',[DashboardController::class,'index']);

Route::get('user',[UserController::class,'index']);
Route::get('user/tambah',[UserController::class,'create']);
Route::post('user/simpan',[UserController::class,'store']);
Route::get('user/edit/{id}',[UserController::class,'show']);
Route::post('user/update/{id}',[UserController::class,'update']);
Route::get('user/delete/{id}',[UserController::class,'destroy']);

Route::get('member',[MemberController::class,'index']);
Route::get('member/tambah',[MemberController::class,'create']);
Route::post('member/simpan',[MemberController::class,'store']);
Route::get('member/edit/{id}',[MemberController::class,'show']);
Route::post('member/update/{id}',[MemberController::class,'update']);
Route::get('member/delete/{id}',[MemberController::class,'destroy']);

Route::get('suplier',[SuplierController::class,'index']);
Route::get('suplier/tambah',[SuplierController::class,'create']);
Route::post('suplier/simpan',[SuplierController::class,'store']);
Route::get('suplier/edit/{id}',[SuplierController::class,'show']);
Route::post('suplier/update/{id}',[SuplierController::class,'update']);
Route::get('suplier/delete/{id}',[SuplierController::class,'destroy']);

Route::get('sepatu',[SepatuController::class,'index']);
Route::get('sepatu/detail/{id}',[SepatuController::class,'detail']);
Route::get('sepatu/tambah',[SepatuController::class,'create']);
Route::post('sepatu/simpan',[SepatuController::class,'store']);
Route::get('sepatu/edit/{id}',[SepatuController::class,'show']);
Route::post('sepatu/update/{id}',[SepatuController::class,'update']);
Route::get('sepatu/delete/{id}',[SepatuController::class,'destroy']);

Route::get('transaksi',[TransaksiController::class,'index']);
Route::get('transaksi/tambah',[TransaksiController::class,'create']);
Route::post('transaksi/simpan',[TransaksiController::class,'store']);
Route::get('transaksi/edit/{id}',[TransaksiController::class,'show']);
Route::post('transaksi/update/{id}',[TransaksiController::class,'update']);
Route::get('transaksi/delete/{id}',[TransaksiController::class,'destroy']);
Route::get('transaksi/cetak',[TransaksiController::class,'cetak']);
Route::get('transaksi/struk/{id}',[TransaksiController::class,'struk']);

});