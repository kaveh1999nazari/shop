<?php

namespace App\Http\Controllers\Category;

use App\DataTransferObject\CategoryCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Resources\CategoryResource;
use App\Service\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct(protected readonly CategoryService $categoryService){}
    public function findAll()
    {
        $category = $this->categoryService->findAll();
        return CategoryResource::collection($category);
    }

    public function createCategory(CategoryCreateRequest $request)
    {
        $data = $request->validated();
        $categoryDTO = CategoryCreateDTO::fromArray($data);
        $category = $this->categoryService->createCategory($categoryDTO);
        return CategoryResource::make($category);
    }

    public function findByName(string $name)
    {
        $category = $this->categoryService->findByName($name);
        return CategoryResource::make($category);
    }

    public function updateCategoryByName(CategoryCreateRequest $request, string $name)
    {
        $data = $request->validated();
        $category = $this->categoryService->updateCategoryByName($data, $name);
        return CategoryResource::make($category);
    }

    public function deleteCategoryByName(string $name)
    {
        $category = $this->categoryService->deleteCategoryByName($name);
        return CategoryResource::make($category);
    }
}
