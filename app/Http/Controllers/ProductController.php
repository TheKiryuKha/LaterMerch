<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateProduct;
use App\Actions\DeleteProduct;
use App\Actions\EditProduct;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

final class ProductController
{
    public function index(): Response
    {
        return response(status: 200);
    }

    public function store(ProductRequest $request, CreateProduct $action): RedirectResponse
    {
        $product = $action->handle($request->validated());

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
