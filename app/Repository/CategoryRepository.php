<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository {

    public function findAll() {
        return Category::query()
        ->get();
    }

    public function create(array $data){
        return Category::query()
        ->create($data);
    }

    public function findByName(string $name){
        return Category::query()
        ->where('name', $name)->first();
    }

    public function updateCategoryByName(array $data, string $name){
        $category = Category::query()
        ->where('name', $name)->firstOrFail();
        $category->update($data);
        return $category;
    }

    public function deleteCategoryByName(string $name){
        $category = Category::query()
        ->where('name', $name)->firstOrFail();
        $category->delete();
        return $category;
    }
}
