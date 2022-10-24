<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;

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
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('/', [profileController::class,'beranda'])->name('beranda');

//office
Route::get('/office', [profileController::class,'office']);
Route::get('/tambah-office', [profileController::class,'store_office']);
Route::post('/simpan-office', [profileController::class,'store_office'])->name('simpan');
Route::match(['get', 'post'], '/edit/{id_office}', [profileController::class,'edit_office']);
Route::delete('/office/{id_office}',[profileController::class,'destroy_office']);

Route::get('/fmjimbe', [profileController::class,'fmjimbe']);
Route::get('/fmjatinom', [profileController::class,'fmjatinom']);
Route::get('/gpsjimbe', [profileController::class,'gpsjimbe']);
Route::get('/gpspikatan', [profileController::class,'gpspikatan']);
Route::get('/gpsponggok', [profileController::class,'gpsponggok']);
Route::get('/psinduk', [profileController::class,'induk']);
Route::get('/psbali', [profileController::class,'psbali']);
Route::get('/psponorogo', [profileController::class,'psponorogo']);
Route::get('/pspikatan', [profileController::class,'pspikatan']);
Route::get('/pstrisula', [profileController::class,'pstrisula']);
Route::get('/psgading', [profileController::class,'psgading']);
Route::get('/pssidorejo', [profileController::class,'pssidorejo']);
Route::get('/psamphibi', [profileController::class,'psamphibi']);
Route::get('/psrejotangan', [profileController::class,'psrejotangan']);
Route::get('/psponggok', [profileController::class,'psponggok']);
Route::get('/psbinter', [profileController::class,'psbintang']);
Route::get('/pspare', [profileController::class,'pspare']);
Route::get('/psaulia', [profileController::class,'psaulia']);
Route::get('/jfblitar', [profileController::class,'jfblitar']);
Route::get('/jfmadiun', [profileController::class,'jfmadiun']);
Route::get('/divkend', [profileController::class,'divkend']);
Route::get('/rpa', [profileController::class,'rpa']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
