<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use App\Repositories\BookRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class BookService
{
    public function __construct(
        private BookRepository $bookRepository
    ) {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllBooks(): LengthAwarePaginator
    {
        return $this->bookRepository->getAll();
    }

    /**
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        return $this->bookRepository->getAllCategories();
    }

    /**
     * @param array $data
     * @return Book
     */
    public function createBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

    /**
     * @param Book $book
     * @param array $data
     * @return void
     */
    public function updateBook(Book $book, array $data): void
    {
        $this->bookRepository->update($book, $data);
    }

    /**
     * @param Book $book
     * @return void
     */
    public function deleteBook(Book $book): void
    {
        $this->bookRepository->delete($book);
    }

    /**
     * @param string $search
     * @return LengthAwarePaginator
     */
    public function searchBook(string $search): LengthAwarePaginator
    {
        return $this->bookRepository->search($search);
    }

    /**
     * @param Category $category
     * @return LengthAwarePaginator
     */
    public function getBooksByCategory(Category $category): LengthAwarePaginator
    {
        return $this->bookRepository->getBooksByCategory($category);
    }

    /**
     * @return int
     */
    public function getBookCount(): int
    {
        return $this->bookRepository->getBookCount();
    }
}

