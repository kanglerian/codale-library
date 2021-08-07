<?php

// Admin
use Admin\Kelas\DetailKelasController;
use Admin\Kelas\AdminKelasController;
use Admin\Artikel\AdminArtikelController;
use Admin\Buku\AdminBukuController;
use Admin\Kategori\AdminKategoriController;
use Admin\Penulis\AdminPenulisController;
use Admin\Penerbit\AdminPenerbitController;
use Admin\Peminjaman\AdminPeminjamanController;
use Admin\Dashboard\AdminDashboardController;
use Admin\Baca\AdminBacaController;
use Admin\Member\AdminMemberController;
use Admin\Profile\AdminProfileController;
use Admin\Keranjang\AdminKeranjangController;
use Admin\Beranda\AdminBerandaController;
use Admin\Beranda\AdminKomentarController;
use Admin\Iklan\AdminIklanController;
use Admin\Informasi\AdminInformasiController;
use Admin\Artikel\AdminAudioController;
// Client
use Client\Kelas\KelasController;
use Client\Artikel\ArtikelController;
use Client\Katalog\KatalogController;
use Client\Home\HomeController;
// Others
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'Client\Home\HomeController@index')->name('home');
Route::get('peminjaman/detail/{id}/{trid}','Admin\Peminjaman\AdminPeminjamanController@detail')->name('pinjaman.detail');
Route::post('peminjaman/pinjam','Admin\Peminjaman\Admin\PeminjamanController@pinjam')->name('pinjambuku');
// Route::post('komentar','Admin\Beranda\AdminBerandaController@komentar')->name('komentar');
// Route::delete('komentar/hapus','BerandaController@hapus')->name('hapus');

Auth::routes(['register' => true]);

// Admin Plan
Route::resource('kategori', AdminKategoriController::class)->middleware('auth');
Route::resource('adminkelas', AdminKelasController::class)->middleware('auth');
Route::resource('detailkelas', DetailKelasController::class)->middleware('auth');
Route::resource('article', AdminArtikelController::class)->middleware('auth');
Route::resource('audio', AdminAudioController::class)->middleware('auth');
Route::resource('buku', AdminBukuController::class)->middleware('auth');
Route::resource('penulis', AdminPenulisController::class)->middleware('auth');
Route::resource('penerbit', AdminPenerbitController::class)->middleware('auth');
Route::resource('peminjaman', AdminPeminjamanController::class)->middleware('auth');
Route::resource('dashboard', AdminDashboardController::class)->middleware('auth');
Route::resource('baca', AdminBacaController::class)->middleware('auth');
Route::resource('member', AdminMemberController::class)->middleware('auth');
Route::resource('profile', AdminProfileController::class)->middleware('auth');
Route::resource('akun', AdminKeranjangController::class)->middleware('auth');
Route::resource('beranda', AdminBerandaController::class)->middleware('auth');
Route::resource('komentar', AdminKomentarController::class)->middleware('auth');
Route::resource('informasi', AdminInformasiController::class)->middleware('auth');
Route::resource('iklan', AdminIklanController::class)->middleware('auth');
// Client
Route::resource('landing', HomeController::class);
Route::resource('katalog', KatalogController::class);
Route::resource('kelas', KelasController::class);
Route::resource('artikel', ArtikelController::class);
