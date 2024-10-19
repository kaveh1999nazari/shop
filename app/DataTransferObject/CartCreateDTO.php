<?php

namespace App\DataTransferObject;

class CartCreateDTO {
    public function __construct(
        public ?int $userId,
        public ?string $uuid,
        public int $productPriceId,
        public int $number,
        public int $totalPrice) {}
}

