<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\UploadedFile;
use App\Models\Size;

final readonly class ProductDTO
{
    public function __construct(
        public string $title,
        public string $price,
        public string $description,
        /** @var array<UploadedFile> */
        public array $images = [],
        /** @var array<Size> */
        public array $sizes
    ) {}
}