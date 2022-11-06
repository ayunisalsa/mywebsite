<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/produk', [App\Http\Controllers\HomeController::class, 'produk'])->name('produk');
Route::get('/admin/produk/edit/{id}', [App\Http\Controllers\HomeController::class, 'editProduk'])->name('editProduk');
Route::post('/admin/produk/update/{id}', [App\Http\Controllers\HomeController::class, 'updateProduk'])->name('updateProduk');
Route::get('/admin/request', [App\Http\Controllers\HomeController::class, 'request'])->name('request');

Route::get('/', [App\Http\Controllers\ProdukController::class, 'index'])->name('index');
Route::get('/tambah', [App\Http\Controllers\ProdukController::class, 'create'])->name('create');
Route::post('/tambah', [App\Http\Controllers\ProdukController::class, 'store'])->name('store');
