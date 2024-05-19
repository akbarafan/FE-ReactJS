<?php

use App\Http\Controllers\GuruAPIController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/guru', GuruAPIController::class);
Route::apiResource('/room', KelasAPIController::class);

Route::get('/data-guru', [GuruAPIController::class, 'index']);

Route::post('/send-guru', [GuruAPIController::class, 'store']);

Route::get('/show-guru/{id}', [GuruAPIController::class, 'show']);

Route::put('/update-guru/{id}', [GuruAPIController::class, 'update']);

Route::delete('/delete-guru/{id}', [GuruAPIController::class, 'delete']);