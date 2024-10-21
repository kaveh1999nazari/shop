<?php

namespace App\DataTransferObject;

class CartCreateDTO extends BaseDTO
{
    public function __construct(
        public int $productPriceId,
        public int $number,
        ) {}
}

