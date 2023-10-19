<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllCategories(): LengthAwarePaginator
    {
        return $this->categoryRepository->getAll();
    }

    /**
     * @param array $data
     * @return Category
     */
    public function createCategory(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }

    /**
     * @param Category $category
     * @param array $data
     * @return void
     */
    public function updateCategory(Category $category, array $data): void
    {
        $this->categoryRepository->update($category, $data);
    }

    /**
     * @param Category $category
     * @return void
     */
    public function deleteCategory(Category $category): void
    {
        $this->categoryRepository->delete($category);
    }

    /**
     * @param string $search
     * @return LengthAwarePaginator
     */
    public function searchCategory(string $search): LengthAwarePaginator
    {
        return $this->categoryRepository->search($search);
    }

    /**
     * @return int
     */
    public function getCategoryCount(): int
    {
        return $this->categoryRepository->getCategoryCount();
    }
}


