<?php

namespace App\Http\Controllers\Options;

use App\Http\Requests\OptionRequest;
use App\Http\Resources\OptionResource;
use App\Service\OptionService;
use Illuminate\Http\Request ;

class OptionController
{

    function __construct(protected readonly OptionService $optionService){}

    public function getAllOptions()
    {
        $option = $this->optionService->getAllOptions();
        return OptionResource::collection($option);
    }

    public function createOption(OptionRequest $request)
    {
        $data = $this->optionService->createOption($request->validated());
        return OptionResource::collection($data);
    }

    public function deleteOptionById(int $id)
    {
        $data = $this->optionService->deleteOptionById($id);
        return OptionResource::make($data);

    }

}
