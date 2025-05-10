<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateProduct;
use App\Http\Requests\ProductRequest;
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
}
