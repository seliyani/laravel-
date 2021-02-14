<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;

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

//ROUTE PROVINSI
Route::get('/provinsi', [ProvinsiController::class,'index']);
Route::post('/provinsi/store', [ProvinsiController::class,'store']);
Route::get('/provinsi/{id?}',[ProvinsiController::class,'show']);
Route::post('/provinsi/update/{id?}',[ProvinsiController::class,'update']);
Route::delete('/provinsi/{id?}',[ProvinsiController::class,'destroy']);

// API CONTROLLER
Route::get('/provinsi2/data', [ApiController::class, 'provinsi']);
Route::get('/provinsi2/data/{id?}', [ApiController::class, 'showKasus']);
// Route::get('/provinsi2/showdate', [ApiController::class, 'showDateKasus']);
Route::get('/provinsi2', [ApiController::class, 'all']);

// Kota API Controller
Route::get('/kota2', [ApiController::class, 'kota']);
Route::get('/kota2/{id?}', [ApiController::class, 'showKasusKota']);

// Kecamatan API Controller
Route::get('/kecamatan', [ApiController::class, 'kecamatan']);
Route::get('/kecamatan/{id?}', [ApiController::class, 'showKasusKecamatan']);

// Kelurahan API Controller
Route::get('/kelurahan', [ApiController::class, 'kelurahan']);
Route::get('/kelurahan/{id?}', [ApiController::class, 'showKasusKelurahan']);

// Rw API Controlller
Route::get('/rw', [ApiController::class, 'rw']);
Route::get('/rw/{id?}', [ApiController::class, 'showKasusRw']);

// Global API Controller 
Route::get('/global', [ApiController::class, 'global']);