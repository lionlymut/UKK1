<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\APIGuruController;
use App\Http\Controller\APIIndustriController;
use App\Http\Controller\APISiswaController;
use App\Http\Controller\APIPklController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('guru', APIGuruController::class);
Route::apiResource('industri', APIIndustriController::class);
Route::apiResource('siswa', APISiswaController::class);
Route::apiResource('pkl', APIPklController::class);
