<?php

declare(strict_types=1);

use App\Models\Image;
use App\Models\Product;
use App\Models\Size;

test('to array', function () {
    $product = Product::factory()->create()->fresh();

    expect(array_keys($product->toArray()))->toBe([
        'id',
        'title',
        'price',
        'description',
        'created_at',
        'updated_at',
    ]);
});

it('has many images', function () {
    $product = Product::factory()->has(Image::factory()->count(3))->create();

    expect($product->images)->toHaveCount(3);
});

it('belongs to many sizes', function () {
    $product = Product::factory()->create();
    $sizes = Size::factory()->count(3)->create();
    $product->sizes()->sync($sizes);

    expect($product->sizes)->toHaveCount(3);
});
