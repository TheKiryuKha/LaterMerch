<?php

declare(strict_types=1);

use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('admin deletes product', function () {
    $admin = User::factory()->admin()->create();
    $product = Product::factory()
        ->has(Image::factory()->count(3)->state(['name' => 'test.png']))
        ->hasAttached(Size::factory()->count(3))
        ->create();
    $images = $product->images->map(function ($image) {
        UploadedFile::fake()->image('test.png')
            ->storeAs('images/', $image->name, 'public');

        return $image;
    });

    $this->actingAs($admin)
        ->delete(route('products.destroy', $product))
        ->assertRedirectToRoute('products.index');

    foreach ($images as $image) {
        Storage::disk('public')->assertMissing('images/'.$image->name);
    }

    expect(Product::count())->toBe(0);
    expect(Image::count())->toBe(0);
    expect(Size::count())->not->toBe(0);
});
