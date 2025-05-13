<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateProduct;
use App\Actions\DeleteProduct;
use App\Actions\EditProduct;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class ProductController
{
    public function index(): View
    {
        $products = Product::with('sizes', 'images')->get();

        return view('admin-panel', [
            'products' => $products
        ]);
    }

    public function store(ProductRequest $request, CreateProduct $action): RedirectResponse
    {
        $action->handle($request->validated());

        return to_route('products.index');
    }

    public function update(ProductRequest $request, Product $product, EditProduct $action): RedirectResponse
    {
        $action->handle($product, $request->validated());

        return to_route('products.index');
    }

    public function destroy(Product $product, DeleteProduct $action): RedirectResponse
    {
        $action->handle($product);

        return to_route('products.index');
    }
}
