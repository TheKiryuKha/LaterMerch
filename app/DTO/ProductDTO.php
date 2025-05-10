<?php

declare(strict_types=1);

namespace App\DTO;

use App\Models\Size;
use Illuminate\Http\UploadedFile;

final readonly class ProductDTO
{
    public function __construct(
        public string $title,
        public string $price,
        public string $description,
        /** @var array<Size> */
        public array $sizes,
        /** @var array<UploadedFile> */
        public array $images = []
    ) {}
}
