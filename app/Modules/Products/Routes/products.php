<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Products\Controllers\ProductController;

Route::apiResource('products',ProductController::class);
