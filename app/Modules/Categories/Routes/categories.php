<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Categories\Controllers\CategoryController;

Route::apiResource('categories',CategoryController::class);
