<?php

use App\Http\Controllers\API\ArtikelController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyDokterController;
use App\Http\Controllers\TabelPemilikHewanController;


use App\User;

// use App\Http\Controllers\TabelPenyakitController;

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

Route::get('/', function () {
    return view('welcome',[
        'title' => 'Beranda'
    ]);
});


Route::get('/home', function(){
    return view('welcome',[
        'title' => 'Beranda'
    ]);
});

Route::get('/dashboard', function () {

    return view('beranda',[
        'title' => 'Admin',
        'menu1' => 'Beranda',
        'menu2' => 'Dashboard'
    ]);
    
});


Route::get('/dokter', function(){   
   return view('dokter',[
        'title' => 'Dokter',
        'menu1' => 'Contents',
        'menu2' => 'Dokter',
        'menu3' => 'Created',
        'dokter' => User::all()
    ]);
});




// Route::get('/Gejala_p',function(){
//     return view('penyakit',[
//         'title' => 'Gejala Penyakit'
//     ]);
// });


// Route::post('/create_news',[TabelPenyakitController::class,'create']);



Route::get('/admin',[LoginController::class,'index'])->middleware('guest');
Route::post('/admin',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'keluar']);
Route::post('/create_dokter',[LoginController::class,'create_dokter']);
Route::post('/put_dokter/{id}',[LoginController::class,'update']);

Route::post('/del_dok/{id}', [LoginController::class,'hapus']);
    



Route::post('/register',[TabelPemilikHewanController::class,'register']);

Route::resource('/Gejala_p',DashboardPernyakitController::class)->middleware('auth');

Route::resource('/hewan_p', TabelJenisHewanController::class)->middleware('auth');

Route::resource('/profil_b', TabelProfilBalaiController::class)->middleware('auth');

Route::resource('/basis_a', TabelBasisAturanController::class)->middleware('auth');

Route::resource('/report-pelayanan', TabelReportPelayananController::class)->middleware('auth');

Route::resource('/report-hewan-sakit', TabelReportHewanSakitController::class)->middleware('auth');

Route::resource('/list_gejala', TabelListGejalaController::class)->middleware('auth');

Route::resource('/penyakit_b', DataPenyakitController::class);



