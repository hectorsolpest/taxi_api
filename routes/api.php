<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\TaxiController;
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
Route::get('/bases', [BaseController::class,'index']);
Route::post('/bases', [BaseController::class,'store']);
Route::put('/bases/{base}', [BaseController::class,'update']);
Route::delete('/bases/{base}', [BaseController::class,'destroy']);

Route::get('/brands', [BrandController::class,'index']);
Route::post('/brands', [BrandController::class,'store']);
Route::put('/brands/{brand}', [BrandController::class,'update']);
Route::delete('/brands/{brand}', [BrandController::class,'destroy']);

Route::get('/taxis', [TaxiController::class,'index'])->where([
    'plate_number' => '[A-Za-z0-9\-]+',
    'brand_id' => '[0-9]+',
    'base_id' => '[0-9]+',
]);
Route::post('/taxis', [TaxiController::class,'store']);
Route::put('/taxis/{taxi}', [TaxiController::class,'update']);
Route::delete('/taxis/{taxi}', [TaxiController::class,'destroy']);

Route::get('/journeys/', [JourneyController::class,'index'])->where([
    'taxi_id' => '[0-9]+'
]);
Route::post('/journeys/', [JourneyController::class,'store']);
Route::get('/journeys/count', [JourneyController::class, 'countJourneys']);
