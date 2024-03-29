<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\CustomerRecordManagementController;
use App\Http\Controllers\API\MedicationInventoryManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);

Route::middleware('auth:api')->group( function () {
    Route::apiResource('medication',MedicationInventoryManagementController::class);
    Route::delete('medication/permanentDelete/{id}',[MedicationInventoryManagementController::class,'permanentlyDelete']);
    Route::apiResource('customer',CustomerRecordManagementController::class);
    Route::delete('customer/permanentDelete/{id}',[CustomerRecordManagementController::class,'permanentlyDelete']);
});
