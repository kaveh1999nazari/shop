<?php

namespace App\DataTransferObject;

class ProductCreateDTO
{

    function __construct(
        public string $name,
        public ?string $description,
        public ?array $images,
        public int $categoryId,
        public array $options,
        public int $price,
    ){}
}
