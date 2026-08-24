<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductPageController;

Route::get('/', [ProductPageController::class, 'index']);

Route::get('/products', [ProductPageController::class, 'index']);