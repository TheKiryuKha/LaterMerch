<?php

declare(strict_types=1);

use App\Models\Image;

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
