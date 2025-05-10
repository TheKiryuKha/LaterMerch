<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\ProductDTO;
use Illuminate\Foundation\Http\FormRequest;

final class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'price' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'sizes' => ['sometimes', 'array'],
            'sizes.*' => ['required', 'exists:sizes,id'],
        ];
    }

    public function validated($key = null, $description = null): ProductDTO
    {
        /**
         * @var array{
         *      title: string,
         *      price: string,
         *      description: string,
         *      images: array<\Illuminate\Http\UploadedFile>,
         *      sizes?: array<\App\Models\Size>
         * } $validated
         */
        $validated = parent::validated($key, $description);

        return new ProductDTO(
            title: (string) $validated['title'],
            price: (string) $validated['price'],
            description: (string) $validated['description'],
            images: $validated['images'],
            sizes: $validated['sizes'] ?? []
        );
    }
}
