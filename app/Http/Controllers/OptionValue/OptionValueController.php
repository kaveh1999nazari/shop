<?php

namespace App\Http\Controllers\OptionValue;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionValueRequest;
use App\Http\Resources\OptionValueResource;
use App\Service\OptionValueService;

class OptionValueController extends Controller
{
    function __construct(protected readonly OptionValueService $optionValueService ){}
    public function getAllOptionValues()
    {
        $optionValue = $this->optionValueService->getAllOptionValues();
        return OptionValueResource::collection($optionValue);
    }

    public function createOptionValues(OptionValueRequest $request)
    {
        $data = $this->optionValueService->createOptionValues($request->validated());
        return OptionValueResource::collection($data);
    }

    public function deleteOptionValuesById(int $id)
    {
        $optionValue = $this->optionValueService->deleteOptionValuesById($id);
        return OptionValueResource::make($optionValue);
    }
}
