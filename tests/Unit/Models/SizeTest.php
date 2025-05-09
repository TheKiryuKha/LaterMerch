<?php

declare(strict_types=1);

use App\Models\Size;

test('to array', function () {
    $size = Size::factory()->create()->fresh();

    expect(array_keys($size->toArray()))->toBe([
        'id',
        'title',
        'created_at',
        'updated_at',
    ]);
});
