<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController
{
    public function index(): Response
    {
        return response(status: 200);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'price' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'sizes' => ['sometimes', 'array'],
            'sizes.*' => ['required', 'exists:sizes,id']
        ]);

        $images = $data['images'];
        unset($data['images']);
        $sizes = $data['sizes'];
        unset($data['sizes']);

        $product = Product::create($data);

        foreach($images as $image){
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            
            $image->storeAs('images', $name, 'public');

            Image::create([
                'name' => $name,
                'product_id' => $product->id
            ]);
        }

        $product->sizes()->sync($sizes);

        return to_route('products.index');
    }
}
