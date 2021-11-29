<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\HistoryController;

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

//Middleware auth group for stocks and logs endpoints

Route::middleware('auth:sanctum')->group(function () {
    Route::get('stock/',[StockController::class,'getStock']);
    Route::get('history',[HistoryController::class, 'history']);
});


//Register Route
Route::post('/register',[RegisterController::class,'register']);