<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Carts\Controllers\CartController;

Route::apiResource('carts',CartController::class);
