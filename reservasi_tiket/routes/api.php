<?php

use App\Http\Controllers\API\ReservasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BaseController;

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

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::get('reservasi', [ReservasiController::class, 'index']);
Route::post('reservasi', [ReservasiController::class, 'create']);
Route::put('/reservasi/{id}', [ReservasiController::class, 'update']);
Route::delete('/reservasi/{id}', [ReservasiController::class, 'destroy']);
Route::get('reservasi/{id}', [ReservasiController::class, 'show']);
