<?php

declare(strict_types=1);

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix('admin_panel')->controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')
        ->can('is_Admin', Product::class)
        ->name('products.index');

    Route::post('/products', 'store')
        ->can('is_Admin', Product::class)
        ->name('products.store');

    Route::patch('/products/{product}', 'update')
        ->can('is_Admin', Product::class)
        ->name('products.update');
});
