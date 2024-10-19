<?php

namespace App\Service;

use App\Repository\OptionValueRepository;

class OptionValueService
{
    function __construct(protected readonly OptionValueRepository $optionValueRepository){}
    public function getAllOptionValues()
    {
        return $this->optionValueRepository->getAllOptionValues();
    }

    public function createOptionValues($data)
    {
        return $this->optionValueRepository->createOptionValues($data);
    }

    public function deleteOptionValuesById(int $id)
    {
        return $this->optionValueRepository->deleteOptionValuesById($id);
    }
}
