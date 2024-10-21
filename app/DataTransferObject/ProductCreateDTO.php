<?php

namespace App\DataTransferObject;

class ProductCreateDTO extends BaseDTO {
    public function __construct(
        public string $name,
        public int $category_id,
        public array $options,
        public int $price,
        public ?string $description = null,
        public ?array $images = null,
    ) {}
}

