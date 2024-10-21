<?php

namespace App\DataTransferObject;

class ProductCreateDTO extends BaseDTO {
    public function __construct(
        string $name,
        ?string $description,
        ?array $images,
        int $categoryId,
        array $options,
        int $price,
    ) {}
}

