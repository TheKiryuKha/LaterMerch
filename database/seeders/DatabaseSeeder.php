<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sizes = Size::all();

        $products = Product::factory()->count(20)->create();

        $products->each(function ($product) {
            $product->images()->saveMany(
                Image::factory(rand(1, 5))->create()
            );
        });

        $products->each(function ($product) use ($sizes) {
            $random_sizes = $sizes->random(rand(1, Size::count()))
                ->pluck('id')
                ->toArray();

            $product->sizes()->sync($random_sizes);
        });
    }
}
