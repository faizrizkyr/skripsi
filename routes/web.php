<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/',  [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/admin/bahanbaku', BahanbakuController::class)->middleware('auth');
Route::resource('/admin/sparepart', SparepartController::class)->middleware('auth');
Route::resource('/admin/kategori', KategoriController::class)->middleware('auth');
Route::resource('/admin/pemesanan', PemesananController::class)->middleware('auth');
Route::resource('/admin/pemakaian', PemakaianController::class)->middleware('auth');
Route::get('/admin/transaksi',  [TransaksiController::class, 'index'])->middleware('auth');

Route::get('/admin/sparepart/{sparepart}/bahanbaku/create', [SparepartController::class, 'createBahanbaku']);
Route::post('/admin/sparepart/{sparepart}/bahanbaku/', [SparepartController::class, 'storeBahanbaku']);
Route::get('/admin/sparepart/{sparepart}/bahanbaku/{bahanbaku}/edit', [SparepartController::class, 'editBahanbaku']);
Route::put('/admin/sparepart/{sparepart}/bahanbaku/{bahanbaku}/update', [SparepartController::class, 'updateBahanbaku']);
Route::delete('/admin/sparepart/{sparepart}/bahanbaku/{bahanbaku}', [SparepartController::class, 'destroyBahanbaku']);