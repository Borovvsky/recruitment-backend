<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Services\BookService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * @param BookService $bookService
     */
    public function __construct(
        private readonly BookService $bookService
    ) {
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $books = $search ? $this->bookService->searchBook($search) : $this->bookService->getAllBooks();

        return view('books.index', compact('books'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $categories = $this->bookService->getAllCategories();

        return view('books.create', compact('categories'));
    }

    /**
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $book = $this->bookService->createBook($request->validated());
            $book->categories()->sync($request->input('categories', []));
            DB::commit();

            return redirect()->route('books.show', $book->id)
                ->with('success', __('view.book-added'));
        }catch (Exception $e){
            DB::rollBack();
            Log::error($e);

            return redirect()->route('books.show', $book->id)
                ->with('error', __('view.book-not-added'));
        }
    }

    /**
     * @param Book $book
     * @return View
     */
    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    /**
     * @param Book $book
     * @return View
     */
    public function edit(Book $book): View
    {
        $categories = $this->bookService->getAllCategories();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * @param BookRequest $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->bookService->updateBook($book, $request->validated());
            $book->categories()->sync($request->input('categories', []));

            return redirect()
                ->route('books.show', $book->id)
                ->with('success', __('view.book-successful-updated'));
        }catch (Exception $e){
            DB::rollBack();
            Log::error($e);

            return redirect()
                ->route('books.show', $book->id)
                ->with('success', __('view.book-not-successful-updated'));
        }
    }

    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $this->bookService->deleteBook($book);

        return redirect()->route('books.index')
            ->with('success', __('view.book-successful-deleted'));
    }

    /**
     * @param Category $category
     * @return View
     */
    public function booksByCategory(Category $category): View
    {
        $books = $this->bookService->getBooksByCategory($category);

        return view('books.books_by_category', compact('category', 'books'));
    }
}
