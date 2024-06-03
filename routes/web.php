<?php

use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerCurrency;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/api/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {

    Route::get('/list', [ControllerProduct::class, 'list'])
        ->name('product.list');

    Route::get('/item', [ControllerProduct::class, 'item'])
        ->name('product.item');

    Route::get('/list/item', [ControllerProduct::class, 'listitem'])
        ->name('product.listitem');

    Route::get('/returns/list', [ControllerProduct::class, 'apiList'])
        ->name('product.apiList');
});

Route::prefix('api/currency')->group(function () {
    Route::get('/list', [ControllerCurrency::class, 'list'])
        ->name('currency.list');
});


