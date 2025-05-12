<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Product;
use DB;

final class DeleteProduct
{
    public function __construct(
        private DeleteImages $action
    ) {}

    public function handle(Product $product): bool
    {
        DB::transaction(function () use ($product) {

            $this->action->handle($product);

            $product->delete();
        });

        return true;
    }
}
