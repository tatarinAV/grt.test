<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DiscountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



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

Route::post('/register', [AuthenticationController::class, 'register']);
//All users
Route::resource('products', 'App\Http\Controllers\ProductController')->only(['index', 'show']);
Route::resource('discounts', 'App\Http\Controllers\DiscountController')->only(['index', 'show']);
//Authorise users
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::resource('products', 'App\Http\Controllers\ProductController')->except(['index', 'show']);
    Route::resource('discounts', 'App\Http\Controllers\DiscountController')->except(['index', 'show']);
    Route::put('/products/updateprice/{product}', [ProductController::class, 'updatePrice']);
    });
