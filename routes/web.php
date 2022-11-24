<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
//     return view('employee');
// });

Route::get('/', function(){
    return redirect('/employee');
})->middleware('auth');

Route::put('/employee/keluar/{nomor_induk}', [EmployeeController::class, 'keluar'])->middleware('auth');
Route::resource('/employee', EmployeeController::class)->scoped(['employee' => 'nomor_induk'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::resource('/employee/{company:slug_company}', EmployeeController::class);
// Route::resource('/Karyawan/JIF', EmployeeController::class);
// Route::resource('/Karyawan/JIG', EmployeeController::class);
// Route::resource('/Karyawan/JIA', EmployeeController::class);
// Route::resource('/Karyawan/SAM', EmployeeController::class);
// Route::resource('/Karyawan/LSL', EmployeeController::class);
// Route::resource('/Karyawan/JPR', EmployeeController::class);
// Route::resource('/Karyawan/SPM', EmployeeController::class);
// Route::resource('/Karyawan/SGI', EmployeeController::class);
