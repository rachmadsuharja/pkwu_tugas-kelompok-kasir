<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [AdminController::class,'index'])->name('index');
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('transaction', [AdminController::class, 'transaksi'])->name('transaksi');
Route::resource('menu', MenuController::class);
Route::resource('history', HistoryController::class);
Route::resource('category', CategoryController::class);
