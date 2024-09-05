<?php

use App\Http\Controllers\api\v1\VacationController;
use App\Http\Controllers\api\v1\VacationDailyController;
use App\Http\Controllers\api\v1\VacationReasonController;
use App\Http\Controllers\api\v1\VacationSickController;
use App\Http\Controllers\api\v1\VacationTimeController;
use App\Http\Controllers\api\v1\VacationTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum','maintenance', 'locale'])->prefix('/vacationSys')->group(function () {
    Route::prefix('/vacation')->group(function () {
        Route::get('/', [VacationController::class, 'index']);
        Route::get('/make_data', [VacationController::class, 'makeVacation']);
        Route::get('/filter', [VacationController::class, 'filter']);
        Route::get('/{id}', [VacationController::class, 'show']);
        Route::get('/update_vacations/{id}', [VacationController::class, 'update_vacations']);
        Route::post('/store', [VacationController::class, 'store']);
        Route::post('/update/{id}', [VacationController::class, 'update']);
        Route::delete('/delete/{id}', [VacationController::class, 'destroy']);
    });
    Route::prefix('/vacationDaily')->group(function () {
        Route::get('/', [VacationDailyController::class, 'index']);
        Route::get('/filter', [VacationDailyController::class, 'filter']);
        Route::get('/getDailyMyReport', [VacationDailyController::class, 'getDailyMyReport']);
        Route::get('/{id}', [VacationDailyController::class, 'show']);
        Route::get('/dailyReportByEmployee/{employeeId}', [VacationDailyController::class, 'dailyReportByEmployee']);


        Route::post('/store', [VacationDailyController::class, 'store']);
        Route::post('/update/{id}', [VacationDailyController::class, 'update']);
        Route::delete('/delete/{id}', [VacationDailyController::class, 'destroy']);
    });
    Route::prefix('/vacationSick')->group(function () {
        Route::get('/', [VacationSickController::class, 'index']);
        Route::get('/filter', [VacationSickController::class, 'filter']);
        Route::get('/{vacationSick}', [VacationSickController::class, 'show']);
        Route::post('/store', [VacationSickController::class, 'store']);
        Route::post('/update/{id}', [VacationSickController::class, 'update']);
        Route::delete('/delete/{id}', [VacationSickController::class, 'destroy']);
    });
    Route::prefix('/vacationTime')->group(function () {
        Route::get('/', [VacationTimeController::class, 'index']);
        Route::get('/filter', [VacationTimeController::class, 'filter']);
        Route::get('/reportFlat/{employeeId}', [VacationTimeController::class, 'timeReportByEmployee']);
        Route::get('/getTimelyMyReport', [VacationTimeController::class, 'getTimelyMyReport']);

        Route::get('/{vacationTime}', [VacationTimeController::class, 'show']);
        Route::post('/store', [VacationTimeController::class, 'store']);
        Route::post('/update/{id}', [VacationTimeController::class, 'update']);
        Route::delete('/delete/{id}', [VacationTimeController::class, 'destroy']);
    });
    Route::prefix('/vacationType')->group(function () {
        Route::get('/', [VacationTypeController::class, 'index']);
        Route::get('/{id}', [VacationTypeController::class, 'show']);
        Route::post('/store', [VacationTypeController::class, 'store']);
        Route::post('/update/{id}', [VacationTypeController::class, 'update']);
        Route::delete('/delete/{id}', [VacationTypeController::class, 'destroy']);
    });
    Route::prefix('/vacationReason')->group(function () {
        Route::get('/', [VacationReasonController::class, 'index']);
        Route::get('/{id}', [VacationReasonController::class, 'show']);
        Route::post('/store', [VacationReasonController::class, 'store']);
        Route::post('/update/{id}', [VacationReasonController::class, 'update']);
        Route::delete('/delete/{id}', [VacationReasonController::class, 'destroy']);
    });
});
