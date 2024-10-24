<?php

use App\Http\Controllers\Api\v1\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('/setting')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [SettingController::class, 'index']);
    Route::get('/{id}', [SettingController::class, 'show']);
    Route::post('/store', [SettingController::class, 'store']);
    Route::post('/update/{id}', [SettingController::class, 'update']);
    Route::delete('/delete/{id}', [SettingController::class, 'destroy']);
});
