<?php

use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerCurrency;
use App\Http\Controllers\ControllerShops;
use App\Http\Controllers\ControllerBills;

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

});

Route::prefix('api/currency')->group(function () {
    Route::get('/list', [ControllerCurrency::class, 'list'])
        ->name('currency.list');
});

Route::prefix('api/product')->group(function () {
    Route::get('/list', [ControllerProduct::class, 'list'])
        ->name('product.list');
});

Route::prefix('api/bills')->group(function () {
    Route::get('/list', [ControllerBills::class, 'list'])
        ->name('bills.list');

    Route::post('/store', [ControllerBills::class, 'store'])
        ->name('bills.store');

    Route::post('/storeItem', [ControllerBills::class, 'storeItem'])
        ->name('bills.storeItem');

    Route::get('/{id}', [ControllerBills::class, 'entity'])
        ->name('bills.entity');

    Route::post('/{id}/add-product', [ControllerBills::class, 'addProduct'])
        ->name('bills.add.product');

    Route::post('/{id}/items', [ControllerBills::class, 'getItems'])
        ->name('bills.bill.items');

});

Route::prefix('api/shops')->group(function () {
    Route::get('/list', [ControllerShops::class, 'list'])
        ->name('shops.list');
});

