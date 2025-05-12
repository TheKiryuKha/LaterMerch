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

test('admin edits product', function () {
    $admin = User::factory()->admin()->create();
    $product = Product::factory()
        ->has(Image::factory()->count(3)->state(['name' => 'test_image.png']))
        ->hasAttached(Size::factory()->count(3))
        ->create();

    $oldImage = $product->images->map(function ($image) {
        UploadedFile::fake()->image($image->name)
            ->storeAs('images', $image->name, 'public');

        return $image;
    });

    $newImage = UploadedFile::fake()->image('test_image.png');
    $newSizes = Size::factory()->count(3)->create();

    $this->actingAs($admin)
        ->patch(route('products.update', $product), [
            'title' => 'New Title',
            'price' => '100$',
            'description' => 'New description',
            'sizes' => $newSizes->pluck('id')->toArray(),
            'images' => [$newImage],
        ])
        ->assertredirectToRoute('products.index');

    foreach ($oldImage as $image) {
        Storage::disk('public')->assertMissing('images/'.$image->name);
        $this->assertDatabaseMissing('images', ['id' => $image->name]);
    }

    Storage::disk('public')
        ->assertExists('images/'.Image::first()->name);

    expect($product->fresh())
        ->title->toBe('New Title')
        ->price->toBe('100$')
        ->description->toBe('New description')
        ->images->toHaveCount(1);

    expect($product->sizes)
        ->toHaveCount(3)
        ->pluck('id')->toEqualCanonicalizing($newSizes->pluck('id'));
});
