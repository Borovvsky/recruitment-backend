<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Category::query()->paginate($perPage);
    }

    /**
     * @param array $data
     * @return Category
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * @param Category $category
     * @param array $data
     * @return void
     */
    public function update(Category $category, array $data): void
    {
        $category->update($data);
    }

    /**
     * @param Category $category
     * @return void
     */
    public function delete(Category $category): void
    {
        $category->delete();
    }

    /**
     * @param string $search
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(string $search, int $perPage = 10): LengthAwarePaginator
    {
        return Category::query()->where('name', 'like', "%$search%")->paginate($perPage);
    }

    /**
     * @return int
     */
    public function getCategoryCount(): int
    {
        return Category::query()->count();
    }
}
