<?php

namespace App\Service;

use App\Repository\OptionRepository;

class OptionService
{
    function __construct(protected readonly OptionRepository $optionRepository){}
    public function getAllOptions()
    {
        return $this->optionRepository->getAllOptions();
    }

    public function createOption($data)
    {
        return $this->optionRepository->createOption($data);
    }

    public function deleteOptionById(int $id)
    {
        return $this->optionRepository->deleteOptionById($id);
    }

}
