<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\ApiBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * @return BookCollection
     */
    public function index(): BookCollection
    {
        return new BookCollection(Book::all());
    }

    /**
     * @param ApiBookRequest $apiBookRequest
     * @return JsonResponse
     */
    public function store(ApiBookRequest $apiBookRequest): JsonResponse
    {
        Book::query()->create($apiBookRequest->validated());

        return response()->json([], Response::HTTP_CREATED);
    }

    /**
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book): BookResource
    {
        $book->load('categories');

        return new BookResource($book);
    }

    /**
     * @param ApiBookRequest $apiBookRequest
     * @param Book $book
     * @return JsonResponse
     */
    public function update(ApiBookRequest $apiBookRequest, Book $book): JsonResponse
    {
        $book->update($apiBookRequest->validated());

        return response()->json([], Response::HTTP_OK);
    }

    /**
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
