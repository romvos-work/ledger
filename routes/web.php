<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [\App\Http\Controllers\ControllerProduct::class, 'list'])
    ->name('product.list');

Route::get('/item', [\App\Http\Controllers\ControllerProduct::class, 'item'])
    ->name('product.item');

Route::get('/list/item', [\App\Http\Controllers\ControllerProduct::class, 'item'])
    ->name('product.item');

Route::get('/returns/list', [\App\Http\Controllers\ControllerProduct::class, 'apiList'])
    ->name('product.apiList');

Route::get('/api/list', [\App\Http\Controllers\ControllerProduct::class, 'apiList'])
    ->name('product.apiList');
