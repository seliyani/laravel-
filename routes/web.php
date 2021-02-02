<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('index', function (){
   // return view('layouts.master.index');
// });

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');
use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi', ProvinsiController::class);
use App\Http\Controllers\KotaController;
Route::resource('kota', KotaController::class);
use App\Http\Controllers\kecamatanController;
Route::resource('kecamatan', kecamatanController::class);
use App\Http\Controllers\kelurahanController;
Route::resource('kelurahan', kelurahanController::class);
use App\Http\Controllers\rwController;
Route::resource('rw', rwController::class);
use App\Http\Controllers\kasus2Controller;
Route::resource('kasus2', kasus2Controller::class);
Route::view('city','livewire.home');