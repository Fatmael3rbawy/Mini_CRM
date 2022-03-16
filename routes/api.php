<?php

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Companies 
Route::get('/Companies',[CompanyController::class,'index']);
Route::post('/store/company',[CompanyController::class,'store']);
Route::post('/update/company/{id}',[CompanyController::class,'update']);

//Employees 
Route::get('/employees',[EmployeeController::class,'index']);
Route::post('/store/employee',[EmployeeController::class,'store']);
Route::post('/update/employee/{id}',[EmployeeController::class,'update']);