<?php

namespace App\DataTransferObject;

use Illuminate\Http\UploadedFile;

/**
 * @property UploadedFile[] $images
 */
class ProductCreateDTO extends BaseDTO {
    public function __construct(
        public string $name,
        public int $category_id,
        public array $options,
        public int $price,
        public string $description = '',
        public array $images = [],
    ) {}
}

