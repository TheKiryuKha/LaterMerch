<?php

declare(strict_types=1);

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin_panel')->can('is_Admin', 'product')->controller(ProductController::class)->group(function(){
    Route::get('/products', 'index')
        ->name('products.index');
        
    Route::post('/products', 'store')
        ->name('products.store');
});