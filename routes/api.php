<?php

use App\Http\Controllers\GroundController;
use App\Http\Controllers\StatusKepemilikanController;
use App\Http\Controllers\StatusTanahController;
use App\Http\Controllers\TipeTanahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tipe-tanah', [TipeTanahController::class, 'getAllTipeTanah']);
Route::get('/status-tanah', [StatusTanahController::class, 'getAllStatusTanah']);
Route::get('/status-kepemilikan', [StatusKepemilikanController::class, 'getAllStatusKepemilikan']);

Route::post('/create-ground', [GroundController::class, 'store']);
Route::get('/get-ground', [GroundController::class, 'fetchAllData']);
