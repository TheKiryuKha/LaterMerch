<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use DB;
use Illuminate\Http\UploadedFile;

final class SaveImage
{
    public function handle(Product $product, UploadedFile $image): Image
    {
        return DB::transaction(function () use ($product, $image) {
            $name = uniqid().'.'.$image->getClientOriginalExtension();

            $image->storeAs('images', $name, 'public');

            return Image::create([
                'name' => $name,
                'product_id' => $product->id,
            ]);
        });
    }
}
