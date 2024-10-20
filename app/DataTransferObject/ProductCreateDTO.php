<?php

namespace App\DataTransferObject;

class ProductCreateDTO extends BaseDTO {
    public string $name;
    public ?string $description;
    public ?array $images;
    public int $categoryId;
    public array $options;
    public int $price;

    public function __construct(
        string $name = '',
        ?string $description = null,
        ?array $images = null,
        int $categoryId = 0,
        array $options = [],
        int $price = 0
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->images = $images;
        $this->categoryId = $categoryId;
        $this->options = $options;
        $this->price = $price;
    }
}

