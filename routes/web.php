<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('home');
});

Route::get('/product', [ProdukController::class, 'index']);
Route::get('/add_product', [ProdukController::class, 'add_product']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/add_menu', [MenuController::class, 'add_menu']);

