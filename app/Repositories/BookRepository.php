<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Book::query()->paginate($perPage);
    }

    /**
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        return Category::query()->get();
    }

    /**
     * @param array $data
     * @return Book
     */
    public function create(array $data): Book
    {
        return Book::create($data);
    }

    /**
     * @param Book $book
     * @param array $data
     * @return void
     */
    public function update(Book $book, array $data): void
    {
        $book->update($data);
    }

    /**
     * @param Book $book
     * @return void
     */
    public function delete(Book $book): void
    {
        $book->delete();
    }

    /**
     * @param string $search
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(string $search, int $perPage = 10): LengthAwarePaginator
    {
        return Book::query()->where(function ($query) use ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%");
        })->paginate($perPage);
    }

    /**
     * @param Category $category
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getBooksByCategory(Category $category, int $perPage = 10): LengthAwarePaginator
    {
        return $category->books()->paginate($perPage);
    }

    /**
     * @return int
     */
    public function getBookCount(): int
    {
        return Book::query()->count();
    }
}
