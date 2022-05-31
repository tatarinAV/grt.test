<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ProductController::class, 'index']);


Route::group(['middleware' => 'auth:sanctum'], function() {
    // список всех продуктов
    Route::get('products/', [ProductController::class, 'index']);
    // получить продукт
    Route::get('products/{id}', [ProductController::class, 'getProduct']);
    // добавить продукт
    Route::post('products', [ProductController::class, 'createProduct']);
    // обновить продукт
    Route::put('products/{id}', [ProductController::class, 'updateProduct']);
    // удалить продукт
    Route::delete('products/{id}', [ProductController::class, 'deleteProduct']);


    Route::get('discounts/', [DiscountController::class, 'index']);
    // получить скидку
    Route::get('discounts/{id}', [DiscountController::class, 'getDiscount']);
    // добавить скидку
    Route::post('discounts', [DiscountController::class, 'createDiscount']);
    // обновить скидку
    Route::put('discounts/{id}', [DiscountController::class, 'updateDiscount']);
    // удалить скидку
    Route::delete('discounts/{id}', [DiscountController::class, 'deleteDiscount']);

});
