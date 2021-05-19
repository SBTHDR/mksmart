<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CartsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Carts Route
Route::group(['prefix' => 'carts'], function () {
    Route::get('/', [CartsController::class, 'index'])->name('carts');
    Route::post('/store', [CartsController::class, 'store'])->name('carts.store');
    Route::post('/update/{id}', [CartsController::class, 'update'])->name('carts.update');
    Route::post('/delete/{id}', [CartsController::class, 'destroy'])->name('carts.delete');
});
