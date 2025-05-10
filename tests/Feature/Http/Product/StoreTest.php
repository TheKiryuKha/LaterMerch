<?php

declare(strict_types=1);

use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    Storage::fake('public');
});

test('admin can create product', function () {
    $admin = User::factory()->admin()->create();
    $sizes = Size::factory()->count(3)->create();
    $image = UploadedFile::fake()->image('test-image1.png');

    $response = $this->actingAs($admin)
        ->from(route('products.index'))
        ->post(route('products.store'), [
            'title' => 'Test',
            'price' => '100$',
            'description' => 'Test Desc',
            'images' => [$image],
            'sizes' => [
                $sizes[0]->id,
                $sizes[1]->id,
                $sizes[2]->id,
            ],
        ]);

    $response->assertredirectToRoute('products.index');

    Storage::disk('public')->assertExists('images/'.Image::first()->name);

    expect(Product::count())->toBe(1)
        ->and(Product::first())
        ->title->toBe('Test')
        ->price->toBe('100$')
        ->description->toBe('Test Desc')
        ->images->toHaveCount(1);

    expect(Product::first()->sizes)->toHaveCount(3);
});
