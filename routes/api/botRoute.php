<?php

use App\Http\Controllers\Api\v1\BotController;
use Illuminate\Support\Facades\Route;

//Route::prefix('/bot')->middleware(['auth:sanctum'])->group(function () {
Route::prefix('/bot')->middleware(['locale', 'maintenance'])->group(function () {
    Route::get('/', [BotController::class, 'index']);
    Route::get('/getMe', [BotController::class, 'getMe']);
    Route::post('/getUpdates', [BotController::class, 'getUpdates']);
    Route::post('/onBoard', [BotController::class, 'onBoard']);
    Route::get('/sendMessage', [BotController::class, 'sendMessage']);
    Route::get('/sendPhoto', [BotController::class, 'sendPhoto']);
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get(
            '/getEmployeeVacationReportByID/{vacationId}',
            [BotController::class, 'getEmployeeVacationReportByID']
        );
        Route::get('/getEmployeeVacationReportMy', [BotController::class, 'getEmployeeVacationReportMy']);
        Route::options('/getEmployeeVacationReportMy', [BotController::class, 'getEmployeeVacationReportMy']);

    });

    Route::get('/ggg', function () {
        return "Surviaval";
    });
    Route::get('/getUserProfilePhotos', [BotController::class, 'getUserProfilePhotos']);
    Route::get('/getEmployeeVacationReport/{chat_id}', [BotController::class, 'getEmployeeVacationReport']);
    Route::get('/setHookUrl', [BotController::class, 'setHookUrl']);
});
