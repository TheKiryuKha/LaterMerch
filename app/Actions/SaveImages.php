<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use DB;
use Illuminate\Http\UploadedFile;

final class SaveImages
{
    /**
     * Executes action
     *
     * @param  array<UploadedFile>  $images
     */
    public function handle(Product $product, array $images): Image
    {
        return DB::transaction(function () use ($product, $images) {
            foreach ($images as $image) {
                $name = uniqid().'.'.$image->getClientOriginalExtension();

                $image->storeAs('images', $name, 'public');

                return Image::create([
                    'name' => $name,
                    'product_id' => $product->id,
                ]);
            }
        });
    }
}
