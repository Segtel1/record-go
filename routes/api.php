<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\EnterpriseProjectController;
use App\Http\Controllers\FinancialActivitiesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/getEnterpriseTypes', [EnterpriseController::class, 'enterprise_types']);


Route::middleware('auth:api')->group(function() {
    Route::get('/getEnterprise', [EnterpriseController::class, 'show']);
    Route::get('/getProducts/{id}', [EnterpriseController::class, 'get_products']);  
    Route::post('/updateEnterprise/{id}', [EnterpriseController::class, 'update']); 
    Route::post('/addOfficer', [EnterpriseController::class, 'add_officer']); 
    Route::post('/createProject', [EnterpriseProjectController::class, 'create_project']);
    Route::post('/createPurchase', [FinancialActivitiesController::class, 'create_purchase']); 
});