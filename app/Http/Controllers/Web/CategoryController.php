<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @param CategoryService $categoryService
     */
    public function __construct(
        private readonly CategoryService $categoryService
    ) {
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $categories = $search ? $this->categoryService->searchCategory($search) : $this->categoryService->getAllCategories();

        return view('categories.index', compact('categories'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = $this->categoryService->createCategory($request->validated());

        return redirect()
            ->route('categories.show', $category->id)
            ->with('success', __('view.category-added'));
    }

    /**
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $this->categoryService->updateCategory($category, $request->validated());

        return redirect()
            ->route('categories.show', $category->id)
            ->with('success', __('view.category-successful-updated'));
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryService->deleteCategory($category);

        return redirect()
            ->route('categories.index')
            ->with('success', __('view.category-successful-deleted'));
    }
}
