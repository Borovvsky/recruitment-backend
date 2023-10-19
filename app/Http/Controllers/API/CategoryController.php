<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\ApiCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @return CategoryCollection
     */
    public function index(): CategoryCollection
    {
        return new CategoryCollection(Category::all());
    }

    /**
     * @param ApiCategoryRequest $apiCategoryRequest
     * @return JsonResponse
     */
    public function store(ApiCategoryRequest $apiCategoryRequest): JsonResponse
    {
        Category::query()->create($apiCategoryRequest->validated());

        return response()->json([], Response::HTTP_CREATED);
    }

    /**
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        $category->load('books');

        return new CategoryResource($category);
    }

    /**
     * @param ApiCategoryRequest $apiCategoryRequest
     * @param Category $category
     * @return JsonResponse
     */
    public function update(ApiCategoryRequest $apiCategoryRequest, Category $category): JsonResponse
    {
        $category->update($apiCategoryRequest->validated());

        return response()->json([], Response::HTTP_OK);
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
