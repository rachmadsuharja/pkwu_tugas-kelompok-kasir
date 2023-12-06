<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class,'login'])->name('login');
    Route::post('postLogin', [AuthController::class, 'postLogin'])->name('post-login');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('transaction', TransactionController::class);
    Route::resource('cart', CartController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('category', CategoryController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
