<?php

use App\Http\Controllers\KelasContoller;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('penulis/profil','PenulisController@profile')->name('penulis.profile');
Route::get('penerbit/profil','PenerbitController@profile')->name('penerbit.profile');
Route::get('buku/detail','BukuController@detail')->name('buku.detail');
Route::get('peminjaman/detail/{id}/{trid}','PeminjamanController@detail')->name('pinjaman.detail');
Route::get('peminjaman/print','PeminjamanController@print')->name('pinjaman.print');
Route::post('peminjaman/pinjam','PeminjamanController@pinjam')->name('pinjambuku');
Route::post('komentar','BerandaController@komentar')->name('komentar');
Route::delete('komentar/hapus','BerandaController@hapus')->name('hapus');

Auth::routes(['register' => true]);

Route::resource('landing', HomeController::class);
Route::resource('katalog', KatalogController::class);
Route::resource('kelas', KelasController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('article', ArticleController::class)->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('buku', BukuController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('penulis', PenulisController::class)->middleware('auth');
Route::resource('penerbit', PenerbitController::class)->middleware('auth');
Route::resource('peminjaman', PeminjamanController::class)->middleware('auth');
Route::resource('baca', BacaController::class)->middleware('auth');
Route::resource('member', MemberController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::resource('akun', MyAccountController::class)->middleware('auth');
Route::resource('beranda', BerandaController::class)->middleware('auth');
Route::resource('komentar', KomentarController::class)->middleware('auth');
Route::resource('informasi', InformasiController::class)->middleware('auth');
Route::resource('iklan', IklanController::class)->middleware('auth');
