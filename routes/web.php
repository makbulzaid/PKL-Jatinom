<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VehicleController;
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

Route::get('/', function(){
    return redirect('/employee');
})->middleware('auth');

Route::get('/employee/berkas', [EmployeeController::class, 'berkas'])->middleware('auth');
Route::post('/employee/import', [EmployeeController::class, 'import'])->middleware('auth');
Route::put('/employee/keluar/{nomor_induk}', [EmployeeController::class, 'keluar'])->middleware('auth');
Route::resource('/employee', EmployeeController::class)->scoped(['employee' => 'nomor_induk'])->middleware('auth');

Route::get('/land/berkas', [LandController::class, 'berkas'])->middleware('auth');
Route::post('/land/import', [LandController::class, 'import'])->middleware('auth');
Route::put('/land/arsip/{nomor_sertifikat}', [LandController::class, 'arsip'])->middleware('auth');
Route::resource('/land', LandController::class)->scoped(['land' => 'nomor_sertifikat'])->middleware('auth');

Route::get('/vehicle/berkas', [VehicleController::class, 'berkas'])->middleware('auth');
Route::post('/vehicle/import', [VehicleController::class, 'import'])->middleware('auth');
Route::put('/vehicle/arsip/{nomor_polisi_bpkb}', [VehicleController::class, 'arsip'])->middleware('auth');
Route::resource('/vehicle', VehicleController::class)->scoped(['vehicle' => 'nomor_polisi_bpkb'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);