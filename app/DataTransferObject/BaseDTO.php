<?php

namespace App\DataTransferObject;

abstract class BaseDTO {
    final public static function fromArray(array $data): static
    {
        $calledClass = static::class;
        $reflectionClass = new \ReflectionClass($calledClass);
        $constructor = $reflectionClass->getConstructor();
        $parameters = $constructor->getParameters();
        $args = [];
        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $args[] = $data[$name] ?? null;
        }
        return new $calledClass(...$args);
    }
}

