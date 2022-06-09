<?php

use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::resource('/dashboard/bahanbaku', BahanbakuController::class)->middleware('auth');
