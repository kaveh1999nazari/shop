<?php

namespace App\DataTransferObject;

abstract class BaseDTO
{
    final public static function fromArray(array $data): self
    {
        $reflection = new \ReflectionClass(static::class);
        $properties = $reflection->getProperties();
        $args = [];

        foreach ($properties as $property) {
            $name = $property->getName();
            $args[] = $data[$name] ?? null;
        }

        return $reflection->newInstanceArgs($args);
    }
}
