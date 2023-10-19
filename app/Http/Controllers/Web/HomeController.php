<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\UserService;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * @param BookService $bookService
     * @param CategoryService $categoryService
     * @param UserService $userService
     */
    public function __construct(
        private readonly BookService $bookService,
        private readonly CategoryService $categoryService,
        private readonly UserService $userService
    ) {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $booksCount = $this->bookService->getBookCount();
        $categoriesCount = $this->categoryService->getCategoryCount();
        $usersCount = $this->userService->getUserCount();

        return view('home', compact('booksCount', 'categoriesCount', 'usersCount'));
    }
}
