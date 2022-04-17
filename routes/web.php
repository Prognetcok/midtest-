<?php

use App\Http\Controllers\Produk_Controller;
use App\Http\Controllers\Paket_Controller;
use App\Http\Controllers\Kategori_Controller;
use App\Http\Controllers\Detail_Paket_Controller;
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

// Route::get('/', function () {
//     return view('PaketCard');
// });

Route::get('/', [Paket_Controller::class,'Produk2'])->name('Produks');

Route::get('viewProduk', [Produk_Controller::class,'Produk'])->name('Produk');
Route::get('addProduk', [Produk_Controller::class,'addProduk'])->name('addProduk');
Route::post('saveProduk', [Produk_Controller::class,'saveProduk'])->name('saveProduk');
Route::get('editProduks/{id}', [Produk_Controller::class,'editProduk'])->name('editProduks');
Route::post('saveeditProduk/{id}', [Produk_Controller::class, 'saveeditProduk'])->name('saveeditProduk');
Route::post('deleteProduk/{id}', [Produk_Controller::class,'deleteProduk'])->name('deleteProduk');

Route::get('viewPaket', [Paket_Controller::class, 'Paket'])->name('Paket');
Route::get('addPaket', [Paket_Controller::class, 'addPaket'])->name('addPaket');
Route::post('savePaket', [Paket_Controller::class, 'savePaket'])->name('savePaket');
Route::get('editPaket/{id}', [Paket_Controller::class, 'editPaket'])->name('editPaket');
Route::post('saveeditPaket/{id}', [Paket_Controller::class, 'saveeditPaket'])->name('saveeditPaket');
Route::post('deletePaket/{id}', [Paket_Controller::class, 'deletePaket'])->name('deletePaket');

Route::get('viewKategori', [Kategori_Controller::class, 'Kategori'])->name('Kategori');
Route::get('addKategori', [Kategori_Controller::class, 'addKategori'])->name('addKategori');
Route::post('saveKategori', [Kategori_Controller::class, 'saveKategori'])->name('saveKategori');
Route::get('editKategori/{id}', [Kategori_Controller::class, 'editKategori'])->name('editKategori');
Route::post('saveeditKategori/{id}', [Kategori_Controller::class, 'saveeditKategori'])->name('saveeditKategori');
Route::post('deleteKategori/{id}', [Kategori_Controller::class, 'deleteKategori'])->name('deleteKategori');

Route::get('viewDetailPaket', [Detail_Paket_Controller::class, 'DetailPaket'])->name('DetailPaket');
Route::get('addDetailPaket', [Detail_Paket_Controller::class, 'addDetailPaket'])->name('addDetailPaket');
Route::post('saveDetailPaket', [Detail_Paket_Controller::class, 'saveDetailPaket'])->name('saveDetailPaket');
Route::get('editDetailPaket/{id}', [Detail_Paket_Controller::class, 'editDetailPaket'])->name('editDetailPaket');
Route::post('saveeditDetailPaket/{id}', [Detail_Paket_Controller::class, 'saveeditDetailPaket'])->name('saveeditDetailPaket');
Route::post('deleteDetailPaket/{id}', [Detail_Paket_Controller::class, 'deleteDetailPaket'])->name('deleteDetailPaket');
