<?php

declare(strict_types=1);

use App\Models\Image;
use App\Models\Product;

test('to array', function () {
    $image = Image::factory()->create()->fresh();

    expect(array_keys($image->toArray()))->toBe([
        'id',
        'name',
        'product_id',
        'created_at',
        'updated_at',
    ]);
});

it('belongs to product', function () {
    $product = Product::factory()->create();
    $image = Image::factory()->create(['product_id' => $product->id]);

    expect($image->product)->toBeInstanceOf(Product::class);
});
