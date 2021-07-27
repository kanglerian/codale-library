<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kuya',function(){
    echo "Hallo";
});

Route::get('penulis','API\WritterController@all');
Route::get('penerbit','API\PublisherController@all');
Route::get('anggota','API\MemberController@all');
Route::get('buku','API\BooksController@all');
