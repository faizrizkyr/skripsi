<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EoqController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\TransaksiController;
use App\Models\Bahanbaku;

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

// Route::get('/', function () {
//     return view('login.index',[
//         'title' => 'Login'
//     ]);
// });

// Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/',  [DashboardController::class, 'index'])->middleware('auth')->name("Dashboard");

Route::resource('/admin/bahanbaku', BahanbakuController::class, ['names' => 'bahan_baku'])->middleware('auth');
Route::resource('/admin/sparepart', SparepartController::class)->middleware('auth');
Route::resource('/admin/kategori', KategoriController::class)->middleware('auth');
Route::resource('/admin/pemesanan', PemesananController::class)->middleware('auth');
Route::resource('/admin/pemakaian', PemakaianController::class)->middleware('auth');
Route::resource('/admin/user', UserController::class)->middleware('auth');

Route::resource('/admin/eoq', EoqController::class, ['names' => 'economic_order_quantity'])->middleware('auth');

Route::post('/admin/eoq/hitung', [EoqController::class, 'hitung']   )->middleware('auth');

Route::get('/admin/transaksi',  [TransaksiController::class, 'index'])->middleware('auth')->name("Transaksi");
Route::get('/admin/bahanbaku/{bahanbaku}/holding-cost',[BahanbakuController::class, 'holding_cost'])->middleware('auth');
Route::get('/admin/bahanbaku/{bahanbaku}/jumlah-kebutuhan',[BahanbakuController::class, 'jumlah_kebutuhan'])->middleware('auth');

Route::get('/admin/sparepart/{sparepart}/bahanbaku/create', [SparepartController::class, 'createBahanbaku']);
Route::post('/admin/sparepart/{sparepart}/bahanbaku/', [SparepartController::class, 'storeBahanbaku']);
Route::get('/admin/sparepart/{sparepart}/bahanbaku/{bahanbaku}/edit', [SparepartController::class, 'editBahanbaku']);
Route::put('/admin/sparepart/{sparepart}/bahanbaku/{bahanbaku}/update', [SparepartController::class, 'updateBahanbaku']);
Route::delete('/admin/sparepart/{sparepart}/bahanbaku/{bahanbaku}', [SparepartController::class, 'destroyBahanbaku']);
