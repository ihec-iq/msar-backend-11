<?php

use App\Http\Controllers\Api\v1\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('/setting')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [SettingController::class, 'index']);
    Route::get('/{setting}', [SettingController::class, 'show']);
    Route::get('/show/key', [SettingController::class, 'showByKey']);
    Route::post('/store', [SettingController::class, 'store']);
    Route::post('/update/{setting}', [SettingController::class, 'update']);
    Route::post('/updatebykey', [SettingController::class, 'updateByKey']);
    Route::delete('/delete/{setting}', [SettingController::class, 'destroy']);
});
