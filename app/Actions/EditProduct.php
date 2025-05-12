<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTO\ProductDTO;
use App\Models\Product;
use DB;

final class EditProduct
{
    public function __construct(
        private UpdateImages $action
    ) {}

    public function handle(Product $product, ProductDTO $dto): bool
    {
        return DB::transaction(function () use ($product, $dto) {
            $product->update([
                'title' => $dto->title,
                'price' => $dto->price,
                'description' => $dto->description,
            ]);

            $this->action->handle($product, $dto->images);

            $product->sizes()->sync($dto->sizes);

            return true;
        });
    }
}
