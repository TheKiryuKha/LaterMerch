<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Product;
use Illuminate\Http\UploadedFile;

final class UpdateImages
{
    public function __construct(
        private SaveImages $save,
        private DeleteImages $delete
    ) {}

    /**
     * Executes the action
     *
     * @param  array<UploadedFile>  $images
     */
    public function handle(Product $product, array $images): bool
    {
        $this->delete->handle($product);
        $this->save->handle($product, $images);

        return true;
    }
}
