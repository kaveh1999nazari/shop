<?php

namespace App\DataTransferObject;

abstract class BaseDTO {
    final public static function fromArray(array $data): static
    {
          return new static(...$data);
    }
}

