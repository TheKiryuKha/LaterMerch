<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Product;
use DB;
use Storage;

final class DeleteImages
{
    public function handle(Product $product): bool
    {
        DB::transaction(function () use ($product) {
            foreach ($product->images as $image) {
                $image->delete();
                Storage::disk('public')->delete('images/'.$image->name);
            }
        });

        return true;
    }
}
