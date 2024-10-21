<?php

namespace App\DataTransferObject;

class ProductCreateDTO extends BaseDTO {
    public function __construct(
        public string $name,
        public ?string $description,
        public ?array $images,
        public int $category_id,
        public array $options,
        public int $price,
    ) {}
}

