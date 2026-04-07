<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\PurchaseController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\PrescriptionController;
use App\Http\Controllers\API\AlertController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiResource('medicines', MedicineController::class);
    Route::apiResource('suppliers', SupplierController::class);
    Route::apiResource('purchases', PurchaseController::class);
    Route::apiResource('sales', SaleController::class);
    Route::apiResource('prescriptions', PrescriptionController::class);
    Route::apiResource('alerts', AlertController::class);
});
