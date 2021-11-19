<?php

use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\ProfilBalaiController;
use App\Http\Controllers\ApiLoginController;

use App\TabelJenisHewan;
use App\TabelListGejala;
use App\TabelProfilBalai;
use App\User;
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

Route::get('/balai', function () {
    return TabelProfilBalai::all();
});

Route::get('/penyakit',[ArtikelController::class,'index']);

Route::get('/dokter', function () {
    return User::all();
});

Route::get('/gejala', function () {
    return TabelListGejala::all();
});

Route::get('/jenis', function () {
    return TabelJenisHewan::all();
});

Route::post('/login',[ApiLoginController::class,'login']);

Route::post('/get_profil',[ApiLoginController::class,'get_profil']);



Route::resource('/addMyPats', TabelHewanController::class);
Route::get('/pet/{id}',[TabelHewanController::class,'show']);

