<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;

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

Route::group(['prefix' => 'logins'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/{id}', [LoginController::class, 'show']);
    Route::post('/', [LoginController::class, 'store']);
    Route::put('/{id}', [LoginController::class, 'update']);
    Route::delete('/{id}', [LoginController::class, 'destroy']);
});

Route::group(['prefix' => 'transactions'], function () {
    Route::get('/', [TransactionController::class, 'index']);
    Route::get('/{id}', [TransactionController::class, 'show']);
    Route::post('/', [TransactionController::class, 'store']);
    Route::put('/{id}', [TransactionController::class, 'update']);
    Route::delete('/{id}', [TransactionController::class, 'destroy']);
});

Route::group(['prefix' => 'menus'], function () {
    Route::get('/', [MenuController::class, 'index']);
    Route::get('/{id}', [MenuController::class, 'show']);
    Route::post('/', [MenuController::class, 'store']);
    Route::put('/{id}', [MenuController::class, 'update']);
    Route::delete('/{id}', [MenuController::class, 'destroy']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::group(['prefix' => 'invoices'], function () {
    Route::get('/', [InvoiceController::class, 'index']);
    Route::get('/{id}', [InvoiceController::class, 'show']);
    Route::post('/', [InvoiceController::class, 'store']);
    Route::put('/{id}', [InvoiceController::class, 'update']);
    Route::delete('/{id}', [InvoiceController::class, 'destroy']);
});