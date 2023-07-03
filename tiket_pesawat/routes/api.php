<?php

use App\Http\Controllers\ListPesawatController;
use App\Http\Controllers\JadwalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::get('list', [ListPesawatController::class, 'index']);
Route::post('list', [ListPesawatController::class, 'create']);
Route::put('/list/{id}', [ListPesawatController::class, 'update']);
Route::delete('/list/{id}', [ListPesawatController::class, 'destroy']);
Route::get('/list/{id}', [ListPesawatController::class, 'show']);

Route::get('pesawat', [JadwalController::class, 'index']);
Route::post('pesawat', [JadwalController::class, 'create']);
Route::put('/pesawat/{id}', [JadwalController::class, 'update']);
Route::delete('/pesawat/{id}', [JadwalController::class, 'destroy']);
Route::get('/pesawat/{id}', [JadwalController::class, 'show']);