<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTO\ProductDTO;
use App\Models\Product;
use DB;

final class CreateProduct
{
    public function __construct(private SaveImages $action) {}

    public function handle(ProductDTO $dto): Product
    {
        return DB::transaction(function () use ($dto) {
            $product = Product::create([
                'title' => $dto->title,
                'price' => $dto->price,
                'status' => $dto->status,
                'description' => $dto->description,
            ]);

            $this->action->handle($product, $dto->images);

            $product->sizes()->sync($dto->sizes);

            return $product;
        });
    }
}
