<?php

namespace App\Service;

use App\DataTransferObject\CategoryCreateDTO;
use App\Exceptions\NotMatchCategory;
use App\Repository\CategoryRepository;

class CategoryService
{

    function __construct(protected readonly CategoryRepository $categoryRepository) {}

    public function findAll()
    {
        return $this->categoryRepository->findAll();
    }

    public function createCategory(CategoryCreateDTO $categoryCreateDTO)
    {
        return $this->categoryRepository->create([
            'name' => $categoryCreateDTO->name,
        ]);
    }

    public function findByName(string $name)
    {
        $category = $this->categoryRepository->findByName($name);
        if (! $category) {
            throw new NotMatchCategory();
        }
        return $category;
    }

    public function updateCategoryByName(array $data, string $name)
    {
        $category = $this->categoryRepository->updateCategoryByName($data, $name);
        if (! $category) {
            throw new NotMatchCategory();
        }
        return $category;
    }

    public function deleteCategoryByName(string $name)
    {
        $category = $this->categoryRepository->deleteCategoryByName($name);
        if (! $category) {
            throw new NotMatchCategory();
        }
        return $category;
    }
}
