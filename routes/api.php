<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MerchantController;
use App\Http\Controllers\API\MerchantPersonalController;
use App\Http\Controllers\API\SaleStatusController;
use App\Http\Controllers\API\ProductGroupController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\ProductOperationController;
use App\Http\Controllers\API\MerchantSettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Маршруты для сущности Merchant
Route::apiResource('merchants', MerchantController::class);

// Маршруты для сущности MerchantPersonal
Route::apiResource('merchant-personals', MerchantPersonalController::class);

// Маршруты для сущности SaleStatus
Route::apiResource('sale-statuses', SaleStatusController::class);

// Маршруты для сущности ProductGroup
Route::apiResource('product-groups', ProductGroupController::class);

// Маршруты для сущности Product
Route::apiResource('products', ProductController::class);

// Маршруты для сущности Client
Route::apiResource('clients', ClientController::class);

// Маршруты для сущности Task
Route::apiResource('tasks', TaskController::class);

// Маршруты для сущности Sale
Route::apiResource('sales', SaleController::class);

// Маршруты для сущности ProductOperation
Route::apiResource('product-operations', ProductOperationController::class);

// Маршруты для сущности MerchantSetting
Route::apiResource('merchant-settings', MerchantSettingController::class);