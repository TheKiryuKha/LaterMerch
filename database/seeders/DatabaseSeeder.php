<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\ProductStatus;
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

        $images = [
            'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80',

            'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1015&q=80',

            'https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80',
        ];
        $statuses = ProductStatus::cases();

        $sizes = Size::all();
        $products = Product::factory()->count(20)->create();

        $products->each(function ($product) use ($statuses) {
            $product->status = $statuses[array_rand($statuses)];
            $product->save();
        });

        $products->each(function ($product) use ($images) {
            Image::factory()->count(rand(1, 5))
                ->create([
                    'name' => $images[array_rand($images)],
                    'product_id' => $product->id,
                ]);
        });

        $products->each(function ($product) use ($sizes) {
            $random_sizes = $sizes->random(rand(1, Size::count()))
                ->pluck('id')
                ->toArray();

            $product->sizes()->sync($random_sizes);
        });
    }
}
