<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;

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

Route::get('/incomes', [MainController::class, 'fetch_incomes']);
Route::get('/sales', [MainController::class, 'fetch_sales']);
Route::get('/orders', [MainController::class, 'fetch_orders']);
Route::get('/stocks', [MainController::class, 'fetch_stocks']);
