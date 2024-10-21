<?php

namespace App\DataTransferObject;

class CategoryCreateDTO extends BaseDTO
{
    function __construct(public string $name){}
}
