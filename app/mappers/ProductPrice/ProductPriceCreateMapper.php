<?php

namespace App\mappers\ProductPrice;

use App\DataTransferObject\ProductPriceCreateDTO;

class ProductPriceCreateMapper
{
    #[ArrayShape([
        'options' => "array",
        'price' => "integer",
    ])]
    public static function fromArray(array $data): array
    {
        $dtoList[] = new ProductPriceCreateDTO(
            $data['options'],
            $data['price'],
        );
        return $dtoList;
    }
}
