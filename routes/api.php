<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MenuController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/data_product', [ProdukController::class, 'product']);
Route::post('/create_product', [ProdukController::class, 'create_product']);
Route::get('/data_menu', [MenuController::class, 'menu']);
Route::post('/create_menu', [MenuController::class, 'create_menu']);
