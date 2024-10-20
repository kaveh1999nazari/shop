<?php

namespace App\DataTransferObject;

abstract class BaseDTO {
    final public static function fromArray(array $data): static {
        $reflection = new \ReflectionClass(static::class);
        $instance = $reflection->newInstanceWithoutConstructor();

        foreach ($data as $property => $value) {
            if ($reflection->hasProperty($property)) {
                $prop = $reflection->getProperty($property);
                $prop->setAccessible(true);
                $prop->setValue($instance, $value);
            }
        }

        return $instance;
    }
}

