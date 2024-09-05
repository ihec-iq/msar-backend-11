<?php

use App\Http\Controllers\api\v1\EmployeeCenterController;
use App\Http\Controllers\API\V1\EmployeeController;
use App\Http\Controllers\Api\v1\EmployeePositionController;
use App\Http\Controllers\Api\v1\EmployeeTypeController;
use App\Http\Controllers\api\v1\HrDocumentController;
use App\Http\Controllers\api\v1\HrDocumentTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/employee')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/lite', [EmployeeController::class, 'getLite']);
    Route::get('/filter', [EmployeeController::class, 'filter']);
    Route::get('/{employee}', [EmployeeController::class, 'show']);
    Route::post('/store', [EmployeeController::class, 'store']);
    Route::post('/update/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/delete/{employee}', [EmployeeController::class, 'destroy']);
});
Route::prefix('/employee_type')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [EmployeeTypeController::class, 'index']);
});
Route::prefix('/employee_position')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [EmployeePositionController::class, 'index']);
});
Route::prefix('/employee_center')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [EmployeeCenterController::class, 'index']);
});
Route::prefix('/hr_document')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [HrDocumentController::class, 'index']);
    Route::get('/filter', [HrDocumentController::class, 'filter']);
    Route::get('/{id}', [HrDocumentController::class, 'show']);
    Route::post('/store', [HrDocumentController::class, 'store']);
    Route::post('/update/{id}', [HrDocumentController::class, 'update']);
    Route::delete('/delete/{id}', [HrDocumentController::class, 'destroy']);
});
Route::prefix('/hr_document_type')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [HrDocumentTypeController::class, 'index']);
});
